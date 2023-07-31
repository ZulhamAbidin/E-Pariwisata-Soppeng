<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />
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

                                <a href="https://themeforest.net/item/sash-bootstrap-5-admin-dashboard-template/35183671"
                                    target="_blank" class="btn ripple btn-min w-lg mb-3 me-2 btn-primary"><i
                                        class="fe fe-play me-2"></i> Get Started
                                </a>
                                <a href="https://themeforest.net/user/spruko/portfolio"
                                    class="btn ripple btn-min w-lg btn-outline-primary mb-3 me-2" target="_blank"><i
                                        class="fe fe-eye me-2"></i>Discover More
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6 my-auto">
                                <img src="{{ asset('assets/images/brand/ikki.jpg') }}" alt="">
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

                                           <a href="{{ route('pengunjung.destinasi.index') }}"class="col-lg-6 col-md-12 d-lg-block">
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

                                            <a href="{{ route('pengunjung.hotel.index') }}" class="col-lg-6 col-md-12 d-lg-block">
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

                                            <a href="{{ route('pengunjung.kuliner.index') }}" class="col-lg-6 col-md-12 d-lg-block">
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

                                            <a href="{{ route('pengunjung.kebudayaan.index') }}" class="col-lg-6 col-md-12 d-lg-block">
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
