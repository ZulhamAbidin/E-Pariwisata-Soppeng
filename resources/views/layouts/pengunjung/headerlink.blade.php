<div class="top sticky overflow-hidden">
    <!--APP-SIDEBAR-->
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar bg-transparent horizontal-main">
        <div class="container">
            <div class="row">
                <div class="main-sidemenu navbar px-0">
                    <a class="navbar-brand ps-0 d-none d-lg-block" href="{{ route('deskripsi.index') }}">
                        <img alt="" class="logo-2" src="../assets/images/brand/logo-3.png">
                        <img src="../assets/images/brand/logo.png" class="logo-3" alt="logo">
                    </a>
                    <ul class="side-menu">
                        <li class="slide">
                            <a class="bok" data-bs-toggle="slide" href="{{ route('deskripsi.index') }}"><span
                                    class="side-menu__label">Home</span></a>
                        </li>
                        <li class="slide">
                            <a class="bok" data-bs-toggle="slide"
                                href="{{ route('pengunjung.destinasi.index') }}"><span
                                    class="side-menu__label">Wisata</span></a>
                        </li>
                        <li class="slide">
                            <a class="bok" data-bs-toggle="slide"
                                href="{{ route('pengunjung.kuliner.index') }}"><span
                                    class="side-menu__label">Kuliner</span></a>
                        </li>
                        <li class="slide">
                            <a class="bok" data-bs-toggle="slide" href="{{ route('pengunjung.hotel.index') }}"><span
                                    class="side-menu__label">Penginapan</span></a>
                        </li>
                        <li class="slide">
                            <a class="bok" data-bs-toggle="slide"
                                href="{{ route('pengunjung.kebudayaan.index') }}"><span
                                    class="side-menu__label">Kebudayaan</span></a>
                        </li>
                        <!-- index.blade.php -->

                    </ul>
                    <div class="header-nav-right d-none d-lg-flex">
                        @auth
                            <div class="d-lg-none d-xl-block">
                                <a href="{{ route('dashboard.index') }}"
                                    class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Dashboard</a>
                            </div>
                        @endauth

                        @guest
                            <div class="d-lg-none d-xl-block">
                                <a href="{{ route('login') }}"
                                    class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Login</a>
                            </div>
                        @endguest

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media screen and (max-width: 992px) {
        .bok {
            margin-left: 20px !important;
            display: block !important;
            padding-top: 15px !important;
            margin-bottom: 10px !important;
        }
    }

    @media screen and (min-width: 993px) {
        .bok {
            display: inline-block !important;
            /* Anda dapat menambahkan properti styling lain untuk menyesuaikan tampilan */
        }
    }
</style>
