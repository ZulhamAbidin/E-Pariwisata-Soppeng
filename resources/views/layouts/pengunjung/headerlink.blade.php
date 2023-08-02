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
                            <a class="bok"
                                data-bs-toggle="slide" href="{{ route('deskripsi.index') }}/#"><span
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
                        {{-- <li class="slide">
                            <a class="bok" data-bs-toggle="slide" href="{{ route('deskripsi.index') }}"><span
                                    class="side-menu__label">Deskripsi</span></a>
                        </li> --}}
                        {{-- <li class="slide">
                            <a class="bok" data-bs-toggle="slide" href=""><span
                                    class="side-menu__label">Contact</span></a>
                        </li> --}}
                    </ul>
                    {{-- <div class="header-nav-right d-none d-lg-flex">
                        <a href="register.html"
                            class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block"
                            target="_blank">New User
                        </a>
                        <a href="login.html"
                            class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block"
                            target="_blank">Login
                        </a>
                    </div> --}}
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
</style>
