<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('assets/icons/logo.ico') }}">

        {{-- Meta untuk tampil di WhatsApp --}}
        @if (Request::segment(1) == '')
            <meta property="og:title" content="Baju Homemade Zalwa Collections" />
            <meta name="description" content="Toko Baju Modern di Mana Gaya Kekinian dan Kreativitas Bertemu!" />
            <meta property="og:url" content="http://zalwacollections.com" />
            <meta property="og:description" content="Baju Homemade Zalwa Collections" />
            <meta property="og:image" content="{{ asset('assets/icons/logo.ico') }}" />
            <meta property="og:type" content="article" />

            <title>Baju Homemade Zalwa Collections</title>

        @elseif (Request::segment(1) == 'detail')
            <meta property="og:title" content="{{ $artikel->judul }}" />
            <meta property="description" content="{{ $artikel->judul }}" />
            <meta property="og:url" content="http://zalwacollections.com/detail/{{ $artikel->slug }}" />
            <meta property="og:description" content="{{ $artikel->judul }}" />
            @if ($artikel->image)
                <meta property="og:image" content="{{ asset('storage/artikel/' . $artikel->image) }}" />
            @else
                <meta property="og:image" content="{{ asset('assets/icons/logo.ico') }}" />
            @endif
            <meta property="og:type" content="article" />

            <title>Baju Homemade Zalwa Collections | {{ $artikel->title }}</title>
        @endif

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        {{-- AOS --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        {{-- Magnific --}}
        <link rel="stylesheet" href="{{ asset('assets/css/magnific.css') }}">

        {{-- Summernote CSS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css">

        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

    <body>
        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Content --}}
        @yield('content')

        {{-- Footer --}}
        <section id="footer" class="bg-white py-4 mt-4" data-aos="zoom-out">
            <div class="container py-4">
              <footer>
                <div class="row">
                  {{-- Kolom 1 Navigasi --}}
                  <div class="col-12 col-md-3 mb-3">
                    <h5 class="fw-bold mb-3">Navigasi</h5>
                    <div class="d-flex">
                      <ul class="nav flex-column me-5">
                        <li class="nav-item mb-2">
                          <a href="" class="nav-link p-0 text-muted">Katalog Produk</a>
                        </li>
                        <li class="nav-item mb-2">
                          <a href="" class="nav-link p-0 text-muted">Gallery Karya</a>
                        </li>
                        <li class="nav-item mb-2">
                          <a href="" class="nav-link p-0 text-muted">Pemesanan</a>
                        </li>
                        <li class="nav-item mb-2">
                          <a href="" class="nav-link p-0 text-muted">Testimoni Pelanggan</a>
                        </li>
                      </ul>
                      <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                          <a href="#" class="nav-link p-0 text-muted">Panduan Ukuran</a>
                        </li>
                        <li class="nav-item mb-2">
                          <a href="/prestasi" class="nav-link p-0 text-muted">Tentang Kami</a>
                        </li>
                        <li class="nav-item mb-2">
                          <a href="#" class="nav-link p-0 text-muted">Layanan Kami</a>
                        </li>
                      </ul>
                    </div>
                  </div>

                  {{-- Kolom 2 Media Sosial --}}
                  <div class="col-12 col-md-3 mb-3">
                    <h5 class="fw-bold mb-3">Follow kami</h5>
                    <div class="d-flex mb-3">
                      <a href="" target="_blank" class="text-decoration-none text-dark">
                        <img src="{{ asset('assets/images/ig.png') }}" height="30" width="30" class="me-4" alt="">
                      </a>
                      <a href="" target="_blank" class="text-decoration-none text-dark">
                        <img src="{{ asset('assets/images/wa.png') }}" height="30" width="30" class="me-4" alt="">
                      </a>
                      <a href="" target="_blank" class="text-decoration-none text-dark">
                        <img src="{{ asset('assets/images/fb.png') }}" height="30" width="30" class="me-4" alt="">
                      </a>
                      <a href="" target="_blank" class="text-decoration-none text-dark">
                        <img src="{{ asset('assets/images/ig.png') }}" height="30" width="30" class="me-4" alt="">
                      </a>
                    </div>
                  </div>

                  {{-- Kolom 3 Kontak --}}
                  <div class="col-12 col-md-3 mb-3">
                    <h5 class="font-inter fw-bold mb-3">Kontak Kami</h5>
                    <ul class="nav flex-column">
                      <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">zalwa.com</a>
                      </li>
                      <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">0878-xxx-xxx</a>
                      </li>
                      <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">0878-xxx-xxx</a>
                      </li>
                      <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">0878-xxx-xxx</a>
                      </li>
                    </ul>
                  </div>

                  {{-- Kolom 4 Alamat --}}
                  <div class="col-12 col-md-3 mb-3">
                    <h5 class="font-inter fw-bold mb-3">Alamat Jahit</h5>
                    <p>Dsn. Cijengkol 01/04, Cikoneng, Ganeas, Sumedang</p>
                  </div>
                </div>
              </footer>
            </div>
          </section>

          {{-- Footer Bawah --}}
          <section class="bg-light border-top" data-aos="zoom-out">
            <div class="container py-4 d-flex justify-content-between align-items-center">
              <div>
                Rumah Jahit Homemade
              </div>
              <div class="d-flex">
                <p class="me-4 mb-0">Syarat & Ketentuan</p>
                <p class="mb-0">
                  <a href="/kebijakan" class="text-decoration-none text-dark">Kebijakan Privacy</a>
                </p>
              </div>
            </div>
          </section>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

          <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

          {{-- jQuery 1.7.2+ or Zepto.js 1.0+ --}}
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
          <script src="{{ asset('assets/js/magnific.js') }}"></script>

          {{-- JQUERY --}}
          {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script> --}}

          {{-- Summernote JS --}}
          <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

          <script type="text/javascript">
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 200,
                });
            });

            const navbar = document.querySelector(".fixed-top");
            window.onscroll = () => {
              if (window.scrollY > 100) {
                navbar.classList.add("scroll-nav-active");
                navbar.classList.add("text-nav-active");
                // navbar.classList.add("navbar-dark");
              } else {
                navbar.classList.remove("scroll-nav-active");
                // navbar.classList.add("navbar-dark");
              }
            };

            // Animasi AOS
            AOS.init();

            // Magnific
            $(document).ready(function() { // Tambahkan tanda kurung pada `function`
                $('.image-link').magnificPopup({
                    type: 'image',
                    retina: {
                        ratio: 1,
                        replaceSrc: function(item, ratio) {
                            return item.src.replace(/\.\w+$/, function(m) {
                                return '@2x' + m;
                            });
                        }
                    }
                });
            }); // Hapus tanda semicolon `;` dan gunakan kurung tutup untuk function
          </script>

        </body>
  </html>
