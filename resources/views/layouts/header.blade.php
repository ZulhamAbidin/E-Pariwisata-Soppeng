<!-- app-Header -->
<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                href="javascript:void(0)"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="/">
                <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>

            <div class="d-flex order-lg-2 ms-auto header-right-icons">
            

                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">

                            <div class="dropdown  d-flex message">
                                <a class="nav-link icon text-center" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fe fe-message-square"></i><span class="pulse-danger"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading border-bottom">
                                        <div class="d-flex">
                                            <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">You have 
                                                Messages</h6>
                                            <div class="ms-auto">
                                                <a href="javascript:void(0)" class="text-muted p-0 fs-12">make all unread</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="message-menu {{-- message-menu-scroll --}}">
                                        <a class="dropdown-item d-flex" href="chat.html">
                                            {{-- <span class="avatar avatar-md brround me-3 align-self-center cover-image"
                                                data-bs-image-src="../assets/images/users/1.jpg"
                                                style="background: url(&quot;../assets/images/users/1.jpg&quot;) center center;"></span> --}}
                                            <div class="wd-90p">
                                                <div class="d-flex">
                                                    <h5 class="mb-1">Peter Theil</h5>
                                                    <small class="text-muted ms-auto text-end">
                                                        6:45 am
                                                    </small>
                                                </div>
                                                <span>Commented on file Guest list....</span>
                                            </div>
                                        </a>  
                                                                                      
                                    </div>

                                </div>
                            </div>
                          
                            
                            <!-- THEME -->
                            <div class="d-flex country">
                                <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                    <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                    <span class="light-layout"><i class="fe fe-sun"></i></span>
                                </a>
                            </div>

                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>
                            
                            <!-- SIDE-MENU -->
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link leading-none d-flex">
                                    <i class="nav-link icon fe fe-settings text-xl"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-left">
                                            <h5 class="text-dark mb-0 fs-14 fw-semibold">{{auth()->user()->name }}</h5>
                                            {{-- <small class="text-muted">Senior Admin</small> --}}
                                        </div>
                                    </div>

                                    <div class="dropdown-divider m-0"></div>

                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <button class="btn"><i class="dropdown-icon fe fe-user"></i> Profile</button>
                                    </a>

                                    <form action="{{ route('logout') }}" method="post" class="dropdown-item">
                                        @csrf
                                        <button type="submit" class="btn"><i class="dropdown-icon fe fe-alert-circle"></i> Sign out</button>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /app-Header -->