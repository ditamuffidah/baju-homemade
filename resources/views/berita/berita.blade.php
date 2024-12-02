@extends('layouts.layouts')

@section('content')
    {{-- Berita --}}
    <section id="berita" style="margin-top: 100px" class="py-5">
        <div class="container">
            <div class="header-berita text-center">
                <h2 class="fw-bold">Berita tentang Produk</h2>
            </div>

            <div class="row" data-aos="flip-up">
                @foreach ($artikels as $item)
                    <div class="col-lg-4">
                        <div class="card border-0">
                        <img src="{{ asset('storage/artikel/' . $item->image) }}" class="img-fluid" alt="">
                        <div class="konten-berita">
                            <p class="mb-3 text-secondary">{{ $item->create_at }}</p>
                            <h4 class="fw-bold mb-3">{{ $item->judul }}</h4>
                            <p class="text-secondary">#zalwacollections</p>
                            <a href="/detail/{{ $item->slug }}" class="text-decoration-none text-danger">Selengkapnya</a>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Berita --}}
@endsection
