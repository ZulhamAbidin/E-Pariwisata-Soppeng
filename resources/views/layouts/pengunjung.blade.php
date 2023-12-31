<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
    <!-- TITLE -->
    <title>E-Pariwisata</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/dark-style.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="../assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
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
            </div>
            
            <style>
                .abu {
                    background-color: #F6F6FB !important;
                }
                .putih {
                    background-color: #FFFFFF !important;
                }
            </style>

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container abu">
                            @yield('container')
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lihatKomentarButtons = document.querySelectorAll('.lihat-komentar-btn');
    
            lihatKomentarButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const commentId = button.getAttribute('data-commentid');
                    const targetElem = document.querySelector(`.balasan-komentar[data-commentid="${commentId}"]`);
                    
                    if (targetElem.style.display === 'none') {
                        targetElem.style.display = 'block';
                    } else {
                        targetElem.style.display = 'none';
                    }
                });
            });
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const lihatKomentarButtons = document.querySelectorAll('.lihat-komentar-btn');

        lihatKomentarButtons.forEach(button => {
            button.addEventListener('click', function () {
                const commentId = button.getAttribute('data-commentid');
                const targetElem = document.querySelector(`.balasan-komentar[data-commentid="${commentId}"]`);
                
                if (targetElem.style.display === 'none') {
                    targetElem.style.display = 'block';
                } else {
                    targetElem.style.display = 'none';
                }
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const replyButtons = document.querySelectorAll('.reply-badge');
        const commentForms = document.querySelectorAll('.comment-form');
        
        replyButtons.forEach(button => {
            button.addEventListener('click', () => {
                const commentId = button.closest('.reply').getAttribute('data-commentid');
                const form = document.querySelector(`.comment-form[data-commentid="${commentId}"]`);
                
                form.style.display = 'block';
            });
        });

        document.addEventListener('click', (event) => {
            if (!event.target.closest('.comment-form') && !event.target.closest('.reply-badge')) {
                commentForms.forEach(form => {
                    form.style.display = 'none';
                });
            }
        });
    });
</script>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="../assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- COUNTERS JS-->
    <script src="../assets/plugins/counters/counterup.min.js"></script>
    <script src="../assets/plugins/counters/waypoints.min.js"></script>
    <script src="../assets/plugins/counters/counters-1.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="../assets/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="../assets/plugins/company-slider/slider.js"></script>

    <!-- Star Rating Js-->
    <script src="../assets/plugins/rating/jquery-rate-picker.js"></script>
    <script src="../assets/plugins/rating/rating-picker.js"></script>

    <!-- Star Rating-1 Js-->
    <script src="../assets/plugins/ratings-2/jquery.star-rating.js"></script>
    <script src="../assets/plugins/ratings-2/star-rating.js"></script>

    <!-- Sticky js -->
    <script src="../assets/js/sticky.js"></script>

    <!-- CUSTOM JS -->
    <script src="../assets/js/landing.js"></script>
    <!-- CUSTOM JS -->
    <script src="../assets/js/custom.js"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

</body>

</html>
