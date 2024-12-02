@extends('layouts.layouts')

@section('content')
    <section style="margin-top: 100px">
        <div class="container col-xxl-8 py-5">
            <h3 class="fw-bold mb-3">Halaman Dashboard Admin</h3>
            <p>Selamat  datang di halaman Dashboard Admin</p>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/gamispolos.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Blog Artikel</h5>
                          <p class="card-text">Atur dan kelola artikel produk baju</p>
                          <a href="{{ route('blog') }}" class="btn btn-primary">Detail</a>
                        </div>
                      </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/gamispolos.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Photo Produk</h5>
                          <p class="card-text">Atur dan kelola photo produk baju</p>
                          <a href="{{ route('photo') }}" class="btn btn-primary">Detail</a>
                        </div>
                      </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/gamispolos.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Pemesanan</h5>
                          <p class="card-text">Atur dan kelola pemesanan produk</p>
                          <a href="{{ route('pemesanan.index') }}" class="btn btn-primary">Detail</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection
