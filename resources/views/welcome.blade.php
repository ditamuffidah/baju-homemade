@extends('layouts.layouts')

@section('content')
    <section id="hero">
        <div class="container text-center text-white">
            <div class="hero-title" data-aos="fade-up">
                <div class="hero-text">Selamat Datang <br> Di Rumah Jahit Homemade Zalwa Collections</div>
                <h4>Toko Baju Modern di Mana Gaya Kekinian dan Kreativitas Bertemu!</h4>
            </div>
        </div>
    </section>

    <section id="program" style="margin-top: -30px">
        <div class="container col-xxl-9">
            <div class="row">
                <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-right">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <p>Kemeja</p>
                        </div>
                        <img src="{{ asset('assets/images/baju.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-right">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <p>Dress Bridesmaid</p>
                        </div>
                        <img src="{{ asset('assets/images/celana.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-right">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <p>Gamis</p>
                        </div>
                        <img src="{{ asset('assets/images/kerudung.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col mb-2" data-aos="flip-right">
                    <div class="bg-white rounded-3 shadow p-3 d-flex justify-content-between align-items-center">
                        <div>
                            <p>Tunik</p>
                        </div>
                        <img src="{{ asset('assets/images/ciput.png') }}" height="55" width="55" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section id="berita" class="py-5">
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

        <div class="footer-berita text-center">
            <a href="/berita" class="btn btn-outline-danger">Berita Lainnya</a>
        </div>
    </div>
    </section>
    {{-- Berita --}}

    {{-- Katalog --}}
    <section id="katalog" class="py-4">
    <div class="container py-4">
        <div class="text-center">
        <h3 class="fw-bold">Katalog Produk</h3>
        </div>
        <img src="{{ asset('assets/images/kerudung.png') }}" class="img-fluid py-4" alt="">
        <img src="{{ asset('assets/images/kerudung.png') }}" alt="">

        <div class="text-center">
        <a href="" class="btn btn-outline-danger">Katalog Lainnya</a>
        </div>
    </div>
    </section>

    {{-- Pemesanan --}}
    <section id="order" class="py-4">
    <div class="container py-4">
        <div class="row d-flex align-items-center">
        <div class="col-lg-6">
            <div class="d-flex align-items-center mb-3">
            <div class="stripe me-2"></div>
            <h5>Pemesanan</h5>
            </div>
            <h1 class="fw-bold mb-2">Pesan Pakaian Custom Anda Sekarang!</h1>
            <p class="mb-3">
            Kami menyediakan layanan jahitan custom untuk pakaian seperti kemeja, gamis, dress bridesmaid, tunik, dan lainnya. Dapatkan pakaian dengan desain dan ukuran yang sesuai dengan kebutuhan Anda.
            </p>
            <a href="/pemesanan" class="btn btn-outline-danger">Pesan Sekarang</a>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('assets/images/baju.png') }}" class="img-fluid" alt="Desain Pakaian">
        </div>
        </div>
    </div>
    </section>

    {{-- Foto --}}
    <section id="foto" class="section-foto paralax py-4" data-aos="zoom-in-up">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <div class="stripe-putih me-2"></div>
            <h5 class="fw-bold text-white">Foto</h5>
        </div>
        <div>
            <a href="/foto" class="btn btn-outline-white">Foto Lainnya</a>
        </div>
        </div>

        <div class="row section-foto">
            @foreach ($photos as $photo)
                <div class="col-lg-3 col-md-6 col-6">
                    <a class="image-link" href="{{ asset('storage/photo/' . $photo->image) }}">
                        <img src="{{ asset('storage/photo/' . $photo->image) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </section>
@endsection
