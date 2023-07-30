<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

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
    <div id="global-loader">
        <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.html">
                            <img src="../assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="../assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                                    <!-- SEARCH -->
                                    <div class="header-nav-right p-5">
                                        <a href="register.html"
                                            class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto"
                                            target="_blank">New User
                                        </a>
                                        <a href="login.html" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                            target="_blank">Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <div class="landing-top-header overflow-hidden">
                <div class="top sticky overflow-hidden">
                    <!--APP-SIDEBAR-->
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <div class="app-sidebar bg-transparent horizontal-main">
                        <div class="container">
                            <div class="row">
                                <div class="main-sidemenu navbar px-0">
                                    <a class="navbar-brand ps-0 d-none d-lg-block" href="index.html">
                                        <img alt="" class="logo-2" src="../assets/images/brand/logo-3.png">
                                        <img src="../assets/images/brand/logo.png" class="logo-3" alt="logo">
                                    </a>
                                    <ul class="side-menu">
                                        <li class="slide">
                                            <a class="side-menu__item active" data-bs-toggle="slide" href="#home"><span
                                                    class="side-menu__label">Home</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Features"><span
                                                    class="side-menu__label">Features</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#About"><span
                                                    class="side-menu__label">About</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Faqs"><span
                                                    class="side-menu__label">Faq's</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Blog"><span
                                                    class="side-menu__label">Blog</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Clients"><span
                                                    class="side-menu__label">Clients</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Contact"><span
                                                    class="side-menu__label">Contact</span></a>
                                        </li>
                                    </ul>
                                    <div class="header-nav-right d-none d-lg-flex">
                                        <a href="register.html"
                                            class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                            target="_blank">New User
                                        </a>
                                        <a href="login.html"
                                            class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                            target="_blank">Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/APP-SIDEBAR-->
                </div>
                <div class="demo-screen-headline main-demo main-demo-1 spacing-top overflow-hidden reveal" id="home">
                    <div class="container px-sm-0">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 mb-5 pb-5 animation-zidex pos-relative">
                                <h4 class="fw-semibold mt-7">Selamat Datang</h4>
                                    <h2 id="typed-text" class="text-primary fw-bold"></h2>
                                <h6 class="pb-3">Kabupaten Soppeng dikenal dengan sebutan Bumi Latemmamala, daerah ini memiliki jarak sekitar 150 Km dari pusat Kota
                                Makassar. 
                                Terdapat berbagai tempat wisata di Soppeng yang kerap dijadikan tujuan oleh wisatawan. Pasalnya sejumlah wisata di
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
                                <img src="../assets/images/landing/market4.png" alt="">
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
                                        <p class="text-default mb-5 text-center">E-Pariwisata ini memiliki beberapa fitur penunjang untuk liburan anda.</p>
                                        <div class="row mt-7">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-1 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-globe fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Destinasi Wisata</h4>
                                                        <p class="mb-0">Kabupaten Soppeng adalah salah satu Kabupaten di provinsi Sulawesi Selatan, Indonesia. Ibu kota kabupaten ini terletak
                                                        di Watansoppeng dan memilki berbeapa destinasi wisata yang tersebar di beberapa kecamatan. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card  features main-features main-features-2 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-bed fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Penginapan Dan Hotel</h4>
                                                        <p class="mb-0">
                                                            untuk mengakomodasi para pelancong yang singgah ke Watansoppeng, sudah ada beberapa penginapan di Soppeng yang menawarkan fasilitas lengkap dengan tarif sesuai budget.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-11 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-cutlery fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Tempat Kuliner</h4>
                                                        <p class="mb-0">
                                                            Masyarakat Soppeng Sulawesi Selatan juga sangat ramah dan bersahabat. Di Soppeng Sulawesi Selatan terdapat banyak sekali restoran murah, tempat kuliner murah dan tempat makan murah
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="card features main-features main-features-10 wow fadeInUp reveal revealleft"
                                                    data-wow-delay="0.1s">
                                                    <div class="bg-img mb-2 text-left">
                                                        <i class="side-menu__icon fa fa-home fa-3x text-primary"></i>
                                                    </div>
                                                    <div class="text-left">
                                                        <h4 class="fw-bold">Kebudayaan</h4>
                                                        <p class="mb-0">
                                                            Salah satu contoh Budaya Mattudang-Tudangeng (Musyawarah)
                                                            dalam sektor pertanian sebelum masuk musim tanam untuk mempersiapkan segala sesuatu yang terkait budidaya yang akan
                                                            dilakukan,
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                            <!-- ROW-3 OPEN -->
                            <div class="section bg-landing pb-0 bg-image-style" id="About">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">Our Mission</h4>
                                        <span class="landing-title"></span>
                                        <div class="text-center">
                                            <h2 class="text-center fw-semibold">Our mission is to make work meaningful.
                                            </h2>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card bg-transparent">
                                                <div class="card-body text-dark">
                                                    <div class="statistics-info">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-6 ps-0">
                                                                <div class="text-center reveal revealleft mb-3">
                                                                    <img src="../assets/images/landing/business-team-working-on-business-plan.png"
                                                                        alt="" class="br-5">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-6 pe-0 my-auto">

                                                                <div class="ps-5 reveal revealright">
                                                                    <h2 class="text-start fw-semibold fs-25 mb-6">We are
                                                                        a creative agency with a passion for design.
                                                                    </h2>
                                                                    <div class="d-flex">
                                                                        <span><svg style="width:20px;height:20px"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#6c5ffc"
                                                                                    d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
                                                                            </svg></span>
                                                                        <div class="ms-5 mb-4">
                                                                            <h5 class="fw-bold">Quality & Clean Code
                                                                            </h5>
                                                                            <p>The Sash admin code is maintained very
                                                                                cleanly and well-structured with proper
                                                                                comments.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex">
                                                                        <span><svg style="width:20px;height:20px"
                                                                                viewBox="0 0 24 24">
                                                                                <path fill="#6c5ffc"
                                                                                    d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />
                                                                            </svg></span>
                                                                        <div class="ms-5 mb-4">
                                                                            <h5 class="fw-bold">Well Documented</h5>
                                                                            <p>
                                                                                The documentation provides clear-cut
                                                                                material for the Sash admin template.
                                                                                The documentation is explained or
                                                                                instructed in such a way that every user
                                                                                can understand.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-3 CLOSED -->

                            <!-- ROW-8 OPEN -->
                            <div class="section bg-landing" id="Blog">
                                <div class="container">
                                    <div class="row">
                                        <h4 class="text-center fw-semibold">Blog Posts </h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold mb-7">Latest from Blog.</h2>
                                        <div class="col-lg-6">
                                            <div class="card bg-transparent reveal">
                                                <div class="card-body px-1">
                                                    <div class="d-flex overflow-visible">
                                                        <a href="blog-details.html"
                                                            class="card-aside-column br-5 cover-image"
                                                            data-bs-image-src="../assets/images/media/12.jpg"
                                                            style="background: url(&quot;../assets/images/media/12.jpg&quot;) center center;"></a>
                                                        <div class="ps-3 flex-column">
                                                            <span
                                                                class="badge bg-primary me-1 mb-1 mt-1">Business</span>
                                                            <h3><a href="blog-details.html">Voluptatem quia
                                                                    voluptas...</a></h3>
                                                            <div class="">Excepteur sint occaecat cupidatat non
                                                                proident, accusantium sunt in culpa qui officia deserunt
                                                                mollit anim id est laborum....</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card bg-transparent reveal">
                                                <div class="card-body px-1">
                                                    <div class="d-flex overflow-visible">
                                                        <a href="blog-details.html"
                                                            class="card-aside-column br-5 cover-image"
                                                            data-bs-image-src="../assets/images/media/22.jpg"
                                                            style="background: url(&quot;../assets/images/media/22.jpg&quot;) center center;"></a>
                                                        <div class="ps-3 flex-column">
                                                            <span
                                                                class="badge bg-danger me-1 mb-1 mt-1">Lifestyle</span>
                                                            <h3><a href="blog-details.html">Generator on the
                                                                    Internet..</a></h3>
                                                            <div class="">Excepteur sint occaecat cupidatat non
                                                                proident, accusantium sunt in culpa qui officia deserunt
                                                                mollit anim id est laborum....</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- COL-END -->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card bg-transparent reveal">
                                                <div class="card-body px-1">
                                                    <div class="d-flex overflow-visible">
                                                        <a href="blog-details.html"
                                                            class="card-aside-column br-5 cover-image"
                                                            data-bs-image-src="../assets/images/media/about.jpg"
                                                            style="background: url(&quot;../assets/images/media/about.jpg&quot;) center center;"></a>
                                                        <div class="ps-3 flex-column">
                                                            <span
                                                                class="badge bg-secondary me-1 mb-1 mt-1">Travel</span>
                                                            <h3><a href="blog-details.html">Generator on the
                                                                    Internet..</a></h3>
                                                            <div class="">Excepteur sint occaecat cupidatat non
                                                                proident, accusantium sunt in culpa qui officia deserunt
                                                                mollit anim id est laborum....</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- COL-END -->
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card bg-transparent reveal">
                                                <div class="card-body px-1">
                                                    <div class="d-flex overflow-visible">
                                                        <a href="blog-details.html"
                                                            class="card-aside-column br-5 cover-image"
                                                            data-bs-image-src="../assets/images/media/25.jpg"
                                                            style="background: url(&quot;../assets/images/media/25.jpg&quot;) center center;"></a>
                                                        <div class="ps-3 flex-column">
                                                            <span class="badge bg-success me-1 mb-1 mt-1">Meeting</span>
                                                            <h3><a href="blog-details.html">Voluptatem quia
                                                                    voluptas...</a></h3>
                                                            <div class="">Excepteur sint occaecat cupidatat non
                                                                proident, accusantium sunt in culpa qui officia deserunt
                                                                mollit anim id est laborum....</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- COL-END -->
                                        </div>
                                        <div class="text-center">
                                            <a href="blog.html" target="_blank"
                                                class="btn btn-outline-primary pt-2 pb-2"><i
                                                    class="fe fe-arrow-right me-2"></i>Discover More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ROW-8 CLOSED -->


                        </div>
                    </div>
                    <!-- CONTAINER CLOSED-->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER OPEN -->
        <div class="demo-footer">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="top-footer">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-md-12 reveal revealleft">
                                        <h6>About</h6>
                                        <p>Selamat datang di sistem informasi pariwisata! Sistem ini berisi informasi tentang
                                            destinasi kuliner, wisata, hotel, dan
                                            kebudayaan di berbagai lokasi yang menarik untuk dikunjungi.
                                        </p>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                        <h6>Pages</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="">Home</a></li>
                                            <li><a href="">Destinasi Wisata</a></li>
                                            <li><a href="">Destinasi Kuliner</a></li>
                                            <li><a href="">Destinasi Budaya</a></li>
                                            <li><a href="">Destinasi Penginapan</a></li>
                                        </ul>
                                    </div>
                                    {{-- <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                        <h6>Information</h6>
                                        <ul class="list-unstyled mb-5 mb-lg-0">
                                            <li><a href="">Our Team</a></li>
                                            <li><a href="">Contact US</a></li>
                                            <li><a href="">Ten</a></li>
                                            <li><a href="">Services</a></li>
                                            <li><a href="">Blog</a></li>
                                            <li><a href="">Terms and Services</a></li>
                                        </ul>
                                    </div> --}}
                                    <div class="col-lg-4 col-sm-12 col-md-4 reveal revealleft">
                                        <div class="">
                                            <a href="index.html"><img loading="lazy" alt="" class="logo-2 mb-3"
                                                    src="../assets/images/brand/logo-3.png"></a>
                                            <a href="index.html"><img src="../assets/images/brand/logo.png" class="logo-3"
                                                    alt="logo"></a>
                                            <p>Selamat datang di sistem informasi pariwisata! Sistem ini berisi informasi
                                                tentang destinasi kuliner, wisata, hotel, dan
                                                kebudayaan di berbagai lokasi yang menarik untuk dikunjungi.</p>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Enter your email"
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1">
                                                    <button class="btn btn-primary" type="button"
                                                        id="button-addon2">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-list mt-6">
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-facebook"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-youtube"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-twitter"></i></button>
                                            <button type="button" class="btn btn-icon rounded-pill"><i
                                                    class="fa fa-instagram"></i></button>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <footer class="main-footer px-0 pb-0 text-center">
                                <div class="row ">
                                    <div class="col-md-12 col-sm-12">
                                        Copyright © <span id="year"></span> <a href="javascript:void(0)"></a>.
                                        Designed with by <a href="javascript:void(0)"> zlhm</a> All rights reserved.
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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