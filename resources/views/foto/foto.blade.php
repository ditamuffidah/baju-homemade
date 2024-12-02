@extends('layouts.layouts')

@section('content')
    {{-- Foto --}}
    <section id="foto" style="margin-top: 100px" class="section-foto paralax py-4" data-aos="zoom-in-up">
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
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{ asset('assets/images/gamispolos.jpg') }}">
                    <img src="{{ asset('assets/images/gamispolos.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{ asset('assets/images/gamispolos.jpg') }}">
                    <img src="{{ asset('assets/images/gamispolos.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{ asset('assets/images/gamispolos.jpg') }}">
                    <img src="{{ asset('assets/images/gamispolos.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a class="image-link" href="{{ asset('assets/images/gamispolos.jpg') }}">
                    <img src="{{ asset('assets/images/gamispolos.jpg') }}" alt="">
                </a>
            </div>
            </div>
        </div>
        </section>
@endsection
