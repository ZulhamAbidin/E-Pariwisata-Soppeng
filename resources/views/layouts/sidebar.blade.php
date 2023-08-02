<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="/">
                {{-- icon sash --}}
                <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>

            <ul class="side-menu">

                <li class="sub-category">
                    <h3>Main</h3>
                </li>

                <li class="slide">
                    <a href="{{ route('dashboard.index') }}" class="side-menu__item has-link active" data-bs-toggle="slide">
                        <i class="side-menu__icon fa fa-tachometer"></i>
                        <span class="side-menu__label">Dasboard</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('visimisi.index') }}">
                        <i class="side-menu__icon fa fa-thumbs-up"></i>
                        <span class="side-menu__label">Visi Misi</span>
                    </a>
                </li>

                <li class="sub-category">
                    <h3>MASTER</h3>
                </li>

          
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-globe"></i><span class="side-menu__label">Destinasi Wisata</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('destinasi-wisata.index') }}" class="slide-item">List Destinasi Wisata</a></li>
                        <li><a href="{{ route('destinasi-wisata.create') }}" class="slide-item">Tambah Destinasi Wisata</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-cutlery"></i><span class="side-menu__label">Destinasi Kuliner</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('destinasi-kuliner.index') }}" class="slide-item">List Destinasi Kuliner</a></li>
                        <li><a href="{{ route('destinasi-kuliner.create') }}" class="slide-item">Tambah Destinasi Kuliner</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-bed"></i><span class="side-menu__label">Hotel atau Penginapan</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('destinasi-hotel.index') }}" class="slide-item">List Destinasi Hotel </a></li>
                        <li><a href="{{ route('destinasi-hotel.create') }}" class="slide-item">Tambah Destinasi Hotel </a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-home"></i><span class="side-menu__label">Data Kebudayaan</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('destinasi-kebudayaan.index') }}" class="slide-item">List Kebudayaan </a></li>
                        <li><a href="{{ route('destinasi-kebudayaan.create') }}" class="slide-item">Tambah Kebudayaan </a></li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>General</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('profile.edit') }}">
                        <i class="side-menu__icon fa fa-cog"></i>
                        <span class="side-menu__label">Pengaturan Profile</span>
                    </a>
                </li>
                
                <li class="slide">
                    <form action="{{ route('logout') }}" method="post" class="side-menu__item has-link" data-bs-toggle="slide">
                        @csrf
                        <i class="side-menu__icon mr-2 fa fa-sign-out"></i>
                        <button type="submit" class="border-0 bg-transparent">
                            <span class="side-menu__label">Sign out</span>
                        </button>
                    </form>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>

</div>
