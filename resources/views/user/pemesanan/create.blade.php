@extends('layouts.layouts')

@section('content')
<section class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">

        {{-- Navigasi --}}
        <div class="d-flex">
            <a href="{{ route('pemesanan.create') }}">Pemesanan</a>
            <div class="mx-1"> . </div>
            <a href="">Buat Pesanan</a>
        </div>

        <h4>Buat Pesanan</h4>

        <form action="{{ route('pemesanan.store') }}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <label for="">Nama Pemesan</label>
                <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" name="nama_pemesan" value="{{ old('nama_pemesan') }}" placeholder="Masukkan nama pemesan">

                @error('nama_pemesan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Jenis Baju</label>
                <select name="jenis_baju" class="form-select @error('jenis_baju') is-invalid @enderror">
                    <option value="Kemeja" {{ old('jenis_baju') == 'Kemeja' ? 'selected' : '' }}>Kemeja</option>
                    <option value="Dress" {{ old('jenis_baju') == 'Dress' ? 'selected' : '' }}>Dress</option>
                    <option value="Gamis" {{ old('jenis_baju') == 'Gamis' ? 'selected' : '' }}>Gamis</option>
                    <option value="Tunik" {{ old('jenis_baju') == 'Tunik' ? 'selected' : '' }}>Tunik</option>
                </select>

                @error('jenis_baju')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Ukuran</label>
                <input type="text" class="form-control @error('ukuran') is-invalid @enderror" name="ukuran" value="{{ old('ukuran') }}" placeholder="Masukkan ukuran (S/M/L/XL atau custom)">

                @error('ukuran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Jenis Kain (Opsional)</label>
                <input type="text" class="form-control @error('jenis_kain') is-invalid @enderror" name="jenis_kain" value="{{ old('jenis_kain') }}" placeholder="Masukkan jenis kain">

                @error('jenis_kain')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Desain Khusus (Opsional)</label>
                <textarea name="desain_khusus" class="form-control @error('desain_khusus') is-invalid @enderror" rows="3" placeholder="Deskripsikan desain khusus jika ada">{{ old('desain_khusus') }}</textarea>

                @error('desain_khusus')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Estimasi Selesai</label>
                <input type="date" class="form-control @error('estimasi_selesai') is-invalid @enderror" name="estimasi_selesai" value="{{ old('estimasi_selesai') }}">

                @error('estimasi_selesai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>

                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pemesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</section>
@endsection
