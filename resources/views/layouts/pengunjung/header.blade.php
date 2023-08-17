<div class="hor-header header">
    <div class="container main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="">
                <img src="../assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="../assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                        <!-- SEARCH -->

                        @auth
                            <div class="header-nav-right p-5">
                                <a href="{{ route('dashboard.index') }}"
                                    class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Dashboard</a>
                            </div>
                        @endauth

                        @guest
                            <div class="header-nav-right p-5">
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
