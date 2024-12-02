@extends('layouts.layouts')

@section('content')
<section class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <h4>Buat Pesanan</h4>

        <form action="{{ route('pemesanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_baju" class="form-label">Jenis Baju</label>
                <select name="jenis_baju" id="jenis_baju" class="form-select" required>
                    <option value="" disabled selected>Pilih Jenis Baju</option>
                    <option value="Kemeja">Kemeja</option>
                    <option value="Dress Bridesmaid">Dress Bridesmaid</option>
                    <option value="Gamis">Gamis</option>
                    <option value="Tunik">Tunik</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ukuran" class="form-label">Ukuran</label>
                <select name="ukuran" id="ukuran" class="form-select" required>
                    <option value="" disabled selected>Pilih Ukuran</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="jenis_kain" class="form-label">Jenis Kain</label>
                <input type="text" name="jenis_kain" id="jenis_kain" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="desain_khusus" class="form-label">Desain Khusus (Opsional)</label>
                <input type="file" name="desain_khusus" id="desain_khusus" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</section>
@endsection
