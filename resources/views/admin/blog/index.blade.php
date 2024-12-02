@extends('layouts.layouts')

@section('content')
    <section class="py-5" style="margin-top: 100px">
        <div class="container col-xxl-8">

            <h4>Halaman Blog Artikel</h4>

            <a href="{{ route('blog.create') }}" class="btn btn-primary">Buat Artikel</a>

            {{-- Pesan Sukses --}}
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Informasi</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive py-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($artikels as $artikel)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('storage/artikel/'. $artikel->image) }}" height="100" alt="">
                            </td>
                            <td>
                                {{ $artikel->judul }}
                            </td>
                            <td>
                                <a href="{{ route('blog.edit', $artikel->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('blog.destroy', $artikel->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="alert('apakah yakin akan dihapus ?')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
