@extends('layouts.layouts')

@section('content')
<section class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <h4>Edit Pesanan</h4>

        <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="jenis_baju" class="form-label">Jenis Baju</label>
                <select name="jenis_baju" id="jenis_baju" class="form-select" required>
                    <option value="Kemeja" {{ $pemesanan->jenis_baju == 'Kemeja' ? 'selected' : '' }}>Kemeja</option>
                    <option value="Dress Bridesmaid" {{ $pemesanan->jenis_baju == 'Dress Bridesmaid' ? 'selected' : '' }}>Dress Bridesmaid</option>
                    <option value="Gamis" {{ $pemesanan->jenis_baju == 'Gamis' ? 'selected' : '' }}>Gamis</option>
                    <option value="Tunik" {{ $pemesanan->jenis_baju == 'Tunik' ? 'selected' : '' }}>Tunik</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ukuran" class="form-label">Ukuran</label>
                <select name="ukuran" id="ukuran" class="form-select" required>
                    <option value="S" {{ $pemesanan->ukuran == 'S' ? 'selected' : '' }}>S</option>
                    <option value="M" {{ $pemesanan->ukuran == 'M' ? 'selected' : '' }}>M</option>
                    <option value="L" {{ $pemesanan->ukuran == 'L' ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ $pemesanan->ukuran == 'XL' ? 'selected' : '' }}>XL</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="desain_khusus" class="form-label">Desain Khusus (Opsional)</label>
                @if ($pemesanan->desain_khusus)
                    <p><a href="{{ asset('storage/' . $pemesanan->desain_khusus) }}" target="_blank">Lihat Desain Lama</a></p>
                @endif
                <input type="file" name="desain_khusus" id="desain_khusus" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</section>
@endsection
