@extends('layouts.layouts')

@section('content')
<section class="py-5" style="margin-top: 100px">
    <div class="container col-xxl-8">
        <h4>Halaman Admin - Pemesanan</h4>

        {{-- Pesan Sukses --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Informasi:</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive py-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pemesan</th>
                        <th>Jenis Baju</th>
                        <th>Ukuran</th>
                        <th>Status</th>
                        <th>Desain Khusus</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pemesanan->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pemesanan.</td>
                        </tr>
                    @else
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pemesanan as $pemesan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pemesan->user->name }}</td> <!-- Menampilkan nama user -->
                                <td>{{ $pemesan->jenis_baju }}</td>
                                <td>{{ $pemesan->ukuran }}</td>
                                <td>
                                    <span class="badge
                                        {{ $pemesan->status == 'Pending' ? 'bg-warning' : ($pemesan->status == 'Diproses' ? 'bg-info' : ($pemesan->status == 'Selesai' ? 'bg-success' : 'bg-secondary')) }}">
                                        {{ $pemesan->status }}
                                    </span>
                                </td>
                                <td>
                                    @if ($pemesan->desain_khusus)
                                        <a href="{{ asset('storage/' . $pemesan->desain_khusus) }}" target="_blank" class="btn btn-info">Lihat Desain</a>
                                    @else
                                        Tidak Ada
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pemesanan.edit', $pemesan->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('pemesanan.destroy', $pemesan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah yakin akan dihapus?')" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
