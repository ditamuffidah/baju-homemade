<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    # Fungsi Index
    public function index()
    {
        return view('admin.blog.index', [
            'artikels' => Blog::orderBy('id', 'desc')->get()
        ]);
    }

    # Halaman Create
    public function create()
    {
        return view('admin.blog.create');
    }

    # Fungsi Store
    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
            'desc' => 'required|min:20|max:1000', // Menambahkan validasi panjang deskripsi
        ];

        $messages = [
            'judul.required' => 'Judul wajib di isi!',
            'image.required' => 'Photo wajib di isi!',
            'desc.required' => 'Deskripsi wajib di isi!',
        ];

        $this->validate($request, $rules, $messages);

        // Image
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/artikel', $fileName);

        # Artikel
        $storage = "storage/content-artikel";
        $dom = new \DOMDocument();

        # untuk menonaktifkan kesalahan libxml
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        # Menghapus buffer kesalahan libxml
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            // Cek apakah gambar merupakan gambar base64
            if (preg_match('/^data:image\/(\w+);base64,/', $src, $matches)) {
                $mimetype = $matches[1]; // Ekstrak mime type gambar (misalnya 'jpeg', 'png', dll)

                // Decoding base64 data
                $data = substr($src, strpos($src, ',') + 1);
                $imageData = base64_decode($data);

                // Generate nama file unik
                $fileNameContentRand = uniqid() . '.' . $mimetype;
                $filePath = "storage/content-artikel/{$fileNameContentRand}";  // Sesuaikan dengan direktori Anda

                // Simpan gambar ke disk
                Storage::put($filePath, $imageData);  // Gunakan Storage facade untuk menyimpan

                // Update src gambar dengan path yang baru
                $newSrc = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $newSrc);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        // Mengolah deskripsi HTML
        $desc = $dom->saveHTML();

        // Potong deskripsi hingga 1000 karakter
        $desc = substr($desc, 0, 1000);

        // Menghindari potongan HTML yang rusak
        if (substr($desc, -1) !== '>') {
            $desc .= '>';  // Menambahkan tag penutup jika perlu
        }

        // Pastikan panjang deskripsi tidak lebih dari ukuran kolom di database
        if (strlen($desc) > 1000) {
            $desc = substr($desc, 0, 1000);
        }

        // Simpan data artikel
        Blog::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul, '-'),
            'image' => $fileName,
            'desc' => $desc, // Simpan deskripsi yang sudah dipotong
        ]);

        return redirect(route('blog'))->with('success', 'data berhasil di simpan');
    }

    # Halaman Edit
    public function edit($id)
    {
        $artikel = Blog::find($id);
        return view('admin.blog.edit', [
            'artikel' => $artikel
        ]);
    }

    # Fungsi Update
    public function update(Request $request, $id)
    {
        $artikel = Blog::find($id);

        # jika ada image baru
        if ($request->hasFile('image')) {
            $fileCheck = 'required|max:1000|mimes:jpg,jpeg,png';
        } else {
            $fileCheck = '';
        }

        $rules = [
            'judul' => 'required',
            'image' => $fileCheck,
            'desc' => 'required|min:20',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Photo wajib diisi!',
            'desc.required' => 'Deskripsi wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        // cek jika ada image baru
        if ($request->hasFile('image')) {
            if (\File::exists('storage/artikel/' . $artikel->image)) {
                \File::delete('storage/artikel/' . $request->old_image);
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('public/artikel', $fileName);
        }

        if ($request->hasFile('image')) {
            $checkFileName = $fileName;
        } else {
            $checkFileName = $request->old_image;
        }

        // Artikel
        $storage = "storage/content-artikel";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            // Cek apakah gambar merupakan gambar base64
            if (preg_match('/^data:image\/(\w+);base64,/', $src, $matches)) {
                $mimetype = $matches[1]; // Ekstrak mime type gambar (misalnya 'jpeg', 'png', dll)

                // Decoding base64 data
                $data = substr($src, strpos($src, ',') + 1);
                $imageData = base64_decode($data);

                // Generate nama file unik
                $fileNameContentRand = uniqid() . '.' . $mimetype;
                $filePath = "storage/content-artikel/{$fileNameContentRand}";  // Sesuaikan dengan direktori Anda

                // Simpan gambar ke disk
                Storage::put($filePath, $imageData);  // Gunakan Storage facade untuk menyimpan

                // Update src gambar dengan path yang baru
                $newSrc = asset($filePath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $newSrc);
                $img->setAttribute('class', 'img-responsive');
            }
        }

        $artikel->update([
            'judul' => $request->judul,
            'image' => $checkFileName,
            'desc' => $dom->saveHTML(),
        ]);

        return redirect(route('blog'))->with('success', 'data berhasil di update');

    }

    # Fungsi Delete
    public function destroy($id)
    {
        $artikel = Blog::find($id);
        if (\File::exists('storage/artikel/' . $artikel->image)) {
            \File::delete('storage/artikel/' . $artikel->image);
        }

        $artikel->delete();

        return redirect(route('blog'))->with('success', 'data berhasil di hapus');
    }
}
