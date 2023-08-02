{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
@csrf

<!-- Email Address -->
<div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autofocus autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Remember Me -->
<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-primary-button class="ml-3">
        {{ __('Log in') }}
    </x-primary-button>
</div>
</form>
</x-guest-layout>
--}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />
    <title>E-Pariwisata</title>
    <link id="style" href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet" />
</head>

<body class="app sidebar-mini ltr light-mode">

    @if($errors->any())
    <div class="toast show fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-header">
            <img src="../assets/images/brand/logo-2.png" alt="" class="me-2" height="18">
            <strong class="me-auto">E-Pariwisata</strong>
            <button aria-label="Close" class="btn-close fs-20" data-bs-dismiss="toast"><span
                    aria-hidden="true">×</span></button>
        </div>
        <div class="toast-body">
           Kombinasi Email dan Password tidak sesuai
        </div>
    </div>
    @endif


    @include('layouts.pengunjung.loader')

    <div class="page">
        <div class="page-main">

            <div class="col col-login mx-auto mt-7">
                <div class="text-center">
                    <a href="index.html"><img src="../assets/images/brand/logo-white.png" class="header-brand-img"
                            alt=""></a>
                </div>
            </div>
            <div class="side-app">
                <div class="main-container mt-6 justify-items-center mx-auto container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-10 col-md-9 col-xl-5 col-lg-5">
                            <div class="card">

                                <div class="pt-6 fw-bold">
                                    <h4 class="text-center">LOGIN</h4>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 form-label" for="email">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="" value="astriayu@gmail.com" required autofocus
                                                    autocomplete="email">
                                            </div>
                                        </div>
                                        <div class=" row mb-2">
                                            <label for="password" class="col-md-3 form-label">Password</label>
                                            <div class="col-md-9 d-flex align-items-center">
                                                <input type="password" class="form-control" placeholder="" name="password" value="astriayu" autocomplete="password" id="password">
                                                <i class="fa fa-eye" id="showPasswordToggle" style="cursor: pointer; margin-left: 5px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button href="javascript:void(0)" type="submit"
                                            class="btn btn-primary my-1">Login</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    const passwordInput = document.getElementById('password');
    const showPasswordToggle = document.getElementById('showPasswordToggle');

    showPasswordToggle.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>

</html>