<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Notifications\PesananSelesaiNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    public function index()
    {
        // Menampilkan semua pesanan untuk admin
        $pemesanan = Pemesanan::all();

        // Menampilkan nama user untuk setiap pemesanan
        foreach ($pemesanan as $item) {
            echo "Nama Pemesan: " . $item->user->name . "<br>"; // Menampilkan nama user
        }

        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.pemesanan.index', compact('pemesanan'));
        }

        return view('user.pemesanan.index', compact('pemesanan'));
    }

    public function create()
    {
        return view('user.pemesanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'jenis_baju' => 'required',
            'ukuran' => 'required',
            'jenis_kain' => 'nullable',
            'desain_khusus' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'estimasi_selesai' => 'nullable|date',
            'status' => 'required|in:Pending,Diproses,Selesai',
        ]);

        // Jika ada file desain diunggah
        if ($request->hasFile('desain_khusus')) {
            $filePath = $request->file('desain_khusus')->store('desain_khusus', 'public');
            $validated['desain_khusus'] = $filePath;
        }

        // Tambahkan user_id untuk menyimpan ID user yang sedang login
        $validated['user_id'] = auth()->id();

        // Status default untuk pemesanan baru
        $validated['status'] = 'Pending';

        Pemesanan::create($validated);
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dibuat!');
    }

    public function edit($id)
    {
        // Cari data pemesanan berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id);
        // Return view untuk mengedit pemesanan
        return view(auth()->user()->is_admin ? 'admin.pemesanan.edit' : 'user.pemesanan.edit', compact('pemesanan'));
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $validated = $request->validate([
            'nama_pemesan' => 'required',
            'jenis_baju' => 'required',
            'ukuran' => 'required',
            'jenis_kain' => 'nullable',
            'desain_khusus' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'estimasi_selesai' => 'nullable|date',
            'status' => auth()->user()->is_admin ? 'required|string' : 'nullable',
        ]);

        if ($request->hasFile('desain_khusus')) {
            if ($pemesanan->desain_khusus && Storage::exists('public/' . $pemesanan->desain_khusus)) {
                Storage::delete('public/' . $pemesanan->desain_khusus);
            }

            $filePath = $request->file('desain_khusus')->store('desain_khusus', 'public');
            $validated['desain_khusus'] = $filePath;
        }

        // Update status pesanan
        $pemesanan->update($validated);

        // Cek jika status pesanan diubah menjadi 'Selesai' dan kirimkan notifikasi ke user
        if (auth()->user()->is_admin && $request->status == 'Selesai') {
            $user = $pemesanan->user; // Asumsi relasi user terhubung
            $user->notify(new PesananSelesaiNotification($pemesanan)); // Menggunakan Notification Laravel
        }

        return redirect()->route('pemesanan.index')->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus!');
    }
}
