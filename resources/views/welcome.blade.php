<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
    <!-- TITLE -->
    <title>E-Pariwisata</title>

    <style>
        .typed-cursor {
            display: none !important;
        }
    </style>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
    <!-- STYLE CSS -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/dark-style.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="../assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

</head>

<body class="app ltr landing-page horizontal">

    <!-- GLOBAL-LOADER -->
    @include('layouts.pengunjung.loader')
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('layouts.pengunjung.header')

            <!-- /app-Header -->

            <div class="landing-top-header overflow-hidden">

                @include('layouts.pengunjung.headerlink')

                <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal"
                    id="home">
                    <div class="container px-sm-0">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 mb-5 pb-5 animation-zidex pos-relative">
                                <h4 class="fw-semibold mt-7">Selamat Datang</h4>
                                <h2 id="typed-text" class="text-primary fw-bold"></h2>
                                <h6 class="pb-3">Kabupaten Soppeng dikenal dengan sebutan Bumi Latemmamala, daerah ini
                                    memiliki jarak sekitar 150 Km dari pusat Kota
                                    Makassar.
                                    Terdapat berbagai tempat wisata di Soppeng yang kerap dijadikan tujuan oleh
                                    wisatawan. Pasalnya sejumlah wisata di
                                    Soppeng mampu memberikan nuansa yang sejuk, segar, dan menyenangkan bagi wisatawan.
                                </h6>

                                <a href="{{ route('pengunjung.destinasi.index') }}" target="_blank"
                                    class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i class="fe fe-eye me-2"></i>
                                    Lihat Destinasi
                                </a>
                                <a href="{{ route('pengunjung.kuliner.index') }}"
                                    class="btn ripple btn-min w-lg btn-outline-primary mb-3 me-2" target="_blank"><i
                                        class="fa fa-cutlery me-2"></i>Lihat Kuliner
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6 my-auto">
                                <img src="{{ asset('assets/images/brand/ikki2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container">
                        <div class="">


                            <!-- FITUR LIST -->
                            <div class="sptb section bg-white" id="Features">
                                <div class="container">
                                    <div class="row">
                                        {{-- <h4 class="text-center fw-semibold">Fitur E-Pariwisata</h4> --}}
                                        <span class="landing-title"></span>
                                        <h2 class="fw-semibold text-center">Kabupaten Soppeng, Sulawesi Selatan</h2>
                                        <p class="text-default mb-5 text-center">E-Pariwisata ini memiliki beberapa
                                            fitur penunjang untuk liburan anda.</p>
                                        <div class="row mt-7">

                                            <a href="{{ route('pengunjung.destinasi.index') }}"
                                                class="col-lg-6 col-md-12 d-lg-block">
                                                <div class="card features main-features main-features-1 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-globe fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Destinasi Wisata</h4>
                                                        <p class="mb-0">Kabupaten Soppeng adalah salah satu Kabupaten
                                                            di provinsi Sulawesi Selatan, Indonesia. Ibu kota kabupaten
                                                            ini terletak
                                                            di Watansoppeng dan memilki berbeapa destinasi wisata yang
                                                            tersebar di beberapa kecamatan. </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="{{ route('pengunjung.hotel.index') }}"
                                                class="col-lg-6 col-md-12 d-lg-block">
                                                <div class="card  features main-features main-features-2 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-bed fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Penginapan Dan Hotel</h4>
                                                        <p class="mb-0">
                                                            untuk mengakomodasi para pelancong yang singgah ke
                                                            Watansoppeng, sudah ada beberapa penginapan di Soppeng yang
                                                            menawarkan fasilitas lengkap dengan tarif sesuai budget.
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="{{ route('pengunjung.kuliner.index') }}"
                                                class="col-lg-6 col-md-12 d-lg-block">
                                                <div class="card features main-features main-features-11 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.2s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-cutlery fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Tempat Kuliner</h4>
                                                        <p class="mb-0">
                                                            Masyarakat Soppeng Sulawesi Selatan juga sangat ramah dan
                                                            bersahabat. Di Soppeng Sulawesi Selatan terdapat banyak
                                                            sekali restoran murah, tempat kuliner murah dan tempat makan
                                                            murah
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                            <a href="{{ route('pengunjung.kebudayaan.index') }}"
                                                class="col-lg-6 col-md-12 d-lg-block">
                                                <div class="card features main-features main-features-10 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.2s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-home fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Kebudayaan</h4>
                                                        <p class="mb-0">
                                                            Salah satu contoh Budaya Mattudang-Tudangeng (Musyawarah)
                                                            dalam sektor pertanian sebelum masuk musim tanam untuk
                                                            mempersiapkan segala sesuatu yang terkait budidaya yang akan
                                                            dilakukan,
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- <style>
                                .square-image {
                                    width: 200px;
                                    /* Sesuaikan lebar gambar sesuai kebutuhan */
                                    height: 200px;
                                    /* Tinggi gambar sama dengan lebar untuk membuatnya persegi panjang */
                                }

                                .description {
                                    display: -webkit-box;
                                    -webkit-box-orient: vertical;
                                    -webkit-line-clamp: 3;
                                    /* Batas jumlah baris yang ingin ditampilkan */
                                    overflow: hidden;
                                }
                            </style>

                            <div class="section bg-landing" id="Blog">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">Postingan Dengan Rating Tertinngi </h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold mb-7">Rating Tertinggi.</h2>

                                        @foreach ($posts->take(4) as $post)
                                            <div class="col-lg-6">
                                                <div class="card bg-transparent reveal active">
                                                    <div class="card-body px-1">
                                                        <div class="d-flex overflow-visible">
                                                            @if ($post->kebudayaan && $post->kebudayaan->sampul)
                                                                <a href="#"
                                                                    class="card-aside-column br-5 cover-image square-image"
                                                                    data-bs-image-src="{{ asset('storage/' . $post->kebudayaan->sampul) }}"
                                                                    style="background: url(&quot;{{ asset('storage/' . $post->kebudayaan->sampul) }}&quot;) center center;">
                                                                </a>
                                                            @elseif ($post->destinasiWisata && $post->destinasiWisata->sampul)
                                                                <a href="#"
                                                                    class="card-aside-column br-5 cover-image square-image"
                                                                    data-bs-image-src="{{ asset('storage/' . $post->destinasiWisata->sampul) }}"
                                                                    style="background: url(&quot;{{ asset('storage/' . $post->destinasiWisata->sampul) }}&quot;) center center;">
                                                                </a>
                                                            @elseif ($post->destinasiKuliner && $post->destinasiKuliner->sampul)
                                                                <a href="#"
                                                                    class="card-aside-column br-5 cover-image square-image"
                                                                    data-bs-image-src="{{ asset('storage/' . $post->destinasiKuliner->sampul) }}"
                                                                    style="background: url(&quot;{{ asset('storage/' . $post->destinasiKuliner->sampul) }}&quot;) center center;">
                                                                </a>
                                                            @elseif ($post->destinasiHotel && $post->destinasiHotel->sampul)
                                                                <a href="#"
                                                                    class="card-aside-column br-5 cover-image square-image"
                                                                    data-bs-image-src="{{ asset('storage/' . $post->destinasiHotel->sampul) }}"
                                                                    style="background: url(&quot;{{ asset('storage/' . $post->destinasiHotel->sampul) }}&quot;) center center;">
                                                                </a>
                                                            @endif
                                                            <div class="ps-3 flex-column">
                                                                @if ($post->kebudayaan)
                                                                    <span
                                                                        class="badge bg-primary me-1 mb-1 mt-1">Berasal
                                                                        dari tabel Kebudayaan</span>
                                                                    <h3><a
                                                                            href="{{ route('pengunjung.kebudayaan.show', ['destinasikebudayaan' => $post->kebudayaan->id]) }}">{{ $post->kebudayaan->nama }}</a>
                                                                    </h3>
                                                                    <div class="description">
                                                                        {{ $post->kebudayaan->Deskripsi }}</div>
                                                                    <!-- Tambahkan link menuju postingan Kebudayaan -->
                                                                    <a href="{{ route('pengunjung.kebudayaan.show', ['destinasikebudayaan' => $post->kebudayaan->id]) }}"
                                                                        class="btn btn-primary mt-2">Lihat
                                                                        Selengkapnya</a>
                                                                @elseif ($post->destinasiWisata)
                                                                    <span
                                                                        class="badge bg-primary me-1 mb-1 mt-1">Berasal
                                                                        dari tabel Destinasi Wisata</span>
                                                                    <h3><a
                                                                            href="{{ route('pengunjung.destinasi.show', ['destinasiWisata' => $post->destinasiWisata->id]) }}">{{ $post->destinasiWisata->nama }}</a>
                                                                    </h3>
                                                                    <div class="description">
                                                                        {{ $post->destinasiWisata->Deskripsi }}</div>
                                                                    <!-- Tambahkan link menuju postingan Destinasi Wisata -->
                                                                    <a href="{{ route('pengunjung.destinasi.show', ['destinasiWisata' => $post->destinasiWisata->id]) }}"
                                                                        class="btn btn-primary mt-2">Lihat
                                                                        Selengkapnya</a>
                                                                @elseif ($post->destinasiKuliner)
                                                                    <span
                                                                        class="badge bg-primary me-1 mb-1 mt-1">Berasal
                                                                        dari tabel Destinasi Kuliner</span>
                                                                    <h3><a
                                                                            href="{{ route('pengunjung.kuliner.show', ['destinasiKuliner' => $post->destinasiKuliner->id]) }}">{{ $post->destinasiKuliner->nama }}</a>
                                                                    </h3>
                                                                    <div class="description">
                                                                        {{ $post->destinasiKuliner->Deskripsi }}</div>
                                                                    <!-- Tambahkan link menuju postingan Destinasi Kuliner -->
                                                                    <a href="{{ route('pengunjung.kuliner.show', ['destinasiKuliner' => $post->destinasiKuliner->id]) }}"
                                                                        class="btn btn-primary mt-2">Lihat
                                                                        Selengkapnya</a>
                                                                @elseif ($post->destinasiHotel)
                                                                    <span
                                                                        class="badge bg-primary me-1 mb-1 mt-1">Berasal
                                                                        dari tabel Destinasi Hotel</span>
                                                                    <h3><a
                                                                            href="{{ route('pengunjung.hotel.show', ['destinasihotel' => $post->destinasiHotel->id]) }}">{{ $post->destinasiHotel->nama }}</a>
                                                                    </h3>
                                                                    <div class="description">
                                                                        {{ $post->destinasiHotel->Deskripsi }}</div>
                                                                    <!-- Tambahkan link menuju postingan Destinasi Hotel -->
                                                                    <a href="{{ route('pengunjung.hotel.show', ['destinasihotel' => $post->destinasiHotel->id]) }}"
                                                                        class="btn btn-primary mt-2">Lihat
                                                                        Selengkapnya</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="text-center">
                                            <a href="blog.html" target="_blank"
                                                class="btn btn-outline-primary pt-2 pb-2"><i
                                                    class="fe fe-arrow-right me-2"></i>Discover More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            @foreach ($data as $item)
                                <div class="section">
                                    <div class="container">
                                        <div class="row">
                                            <section class="sptb demo-screen-demo" id="faqs">
                                                <div class="container text-center">

                                                    <div class="row align-items-center">
                                                        <h4 class="text-center fw-semibold">Visi dan Misi</h4>
                                                        <span class="landing-title"></span>
                                                        {{-- <h2 class="text-center fw-semibold"></h2> --}}
                                                        <div class="col-lg-12">
                                                            <div class="row justify-content-center">
                                                                <p class="col-lg-9 text-default sub-text mb-7">
                                                                    {{ $item->visi_misi }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <h4 class="text-center fw-semibold">Deskripsi</h4>
                                                        <span class="landing-title"></span>
                                                        {{-- <h2 class="text-center fw-semibold"></h2> --}}
                                                        <div class="col-lg-12">
                                                            <div class="row justify-content-center">
                                                                <p class="col-lg-9 text-default sub-text mb-7">
                                                                    {{ $item->Deskripsi }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <h4 class="text-center fw-semibold">Sejarah</h4>
                                                        <span class="landing-title"></span>
                                                        {{-- <h2 class="text-center fw-semibold"></h2> --}}
                                                        <div class="col-lg-12">
                                                            <div class="row justify-content-center">
                                                                <p class="col-lg-9 text-default sub-text mb-7">
                                                                    {{ $item->sejarah }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row align-items-center">
                                                        <h4 class="text-center fw-semibold">Letak Geografis</h4>
                                                        <span class="landing-title"></span>
                                                        {{-- <h2 class="text-center fw-semibold"></h2> --}}
                                                        <div class="col-lg-12">
                                                            <div class="row justify-content-center">
                                                                <p class="col-lg-9 text-default sub-text mb-7">
                                                                    {{ $item->geografis }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <!-- CONTAINER CLOSED-->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER OPEN -->
        @include('layouts.pengunjung.footer')
        <!-- FOOTER CLOSED -->
    </div>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                strings: ['E-Pariwisata Kabupaten Soppeng'],
                typeSpeed: 100, // Speed of typing in milliseconds
                backSpeed: 50, // Speed of backspacing in milliseconds
                loop: true // Set to true to keep looping the animation
            };

            var typed = new Typed('#typed-text', options);
        });
    </script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/counters/counterup.min.js"></script>
    <script src="../assets/plugins/counters/waypoints.min.js"></script>
    <script src="../assets/plugins/counters/counters-1.js"></script>
    <script src="../assets/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="../assets/plugins/company-slider/slider.js"></script>
    <script src="../assets/plugins/rating/jquery-rate-picker.js"></script>
    <script src="../assets/plugins/rating/rating-picker.js"></script>
    <script src="../assets/plugins/ratings-2/jquery.star-rating.js"></script>
    <script src="../assets/plugins/ratings-2/star-rating.js"></script>
    <script src="../assets/js/sticky.js"></script>
    <script src="../assets/js/landing.js"></script>

</body>

</html>
