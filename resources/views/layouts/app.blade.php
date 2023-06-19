<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    
</head>
<body>
    <div id="app" class="d-flex bg-white shadow-sm ">
        <nav class="d-flex flex-column flex-shrink-0 p-3 hight-a" data-spy="scroll" style="width: 20%; height: 100vh">
            <div  class="container-fluid  ">
                <a href="/" class="d-flex align-items-center mb-5 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="/image/logo.svg" alt="logo">
                </a>
                <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="#" class="nav-link link-body-emphasis pb-0">
                        <img src="/image/icon/dashboard.svg" alt="dashboard" srcset="" class="me-2">
                        Dashboard
                    </a>
                </li>
                <hr>
                <li>
                    <a href="#" class="nav-link link-body-emphasis py-0">
                    <img src="/image/icon/pengaturan.svg" alt="pengaturan umum" srcset="" class="me-2">
                    Pengaturan Umum
                    </a>
                </li>
                <hr>
                <li>
                    <a href="#" class="nav-link link-body-emphasis py-0">
                    <img src="/image/icon/manajemen_banner.svg" alt="manajemen banner" srcset="" class="me-2">
                    Manajemen Banner
                    </a>
                </li>
                <hr>
                <li>
                    <a href="#" class="nav-link link-body-emphasis py-0">
                    <img src="/image/icon/produk.svg" alt="produk" srcset="" class="me-2">
                    Produk
                    </a>
                </li>
                <hr>
                <li>
                    <a href="#" class="nav-link link-body-emphasis py-0">
                    <img src="/image/icon/penjualan.svg" alt="penjualan" srcset="" class="me-2">
                    Penjualan
                    </a>
                </li>
                <hr>
                <li>
                    <a href="#collapseExample" class="nav-link link-body-emphasis py-0 dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <img src="/image/icon/pelanggan.svg" alt="pelanggan" srcset="" class="me-2">
                    Pelanggan
                    </a>
                    <ul class="nav nav-pills flex-column mb-auto collapse ps-4 mt-1" id="collapseExample">
                        <li>
                            <a href="{{ route('pelanggan.index') }}" class="nav-link link-body-emphasis ms-2">
                            Daftar Pelanggan
                            </a>
                        </li>
                    </ul>
                </li>
                </ul>
                <hr>
            </div>
        </nav>
        <div class="w-100 main-bg-color">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse px-4 py-2" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto fw-bold">
                            <img src="/image/icon/icon_page.svg" alt="icon page" class="me-3" srcset="">
                            {{$title}} : {{$breadcrumb}}
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                    <li class="nav-item">
                                        <div class="me-5">
                                            <div class="rounded-circle me-4" width="6rem" height="6rem">
                                                <img src="/image/icon/user.svg" alt="user" srcset="" class="me-2">
                                                {{ Auth::user()->name }}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item ">
                                        <div class="me-4 d-flex">
                                            <img src="/image/icon/notification.svg" alt="notification" srcset="">
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="d-flex me-4 text-decoration-none fw-bold text-secondary">
                                            <img src="/image/icon/setting.svg" alt="notification" srcset="">
                                            <p class="ms-2 my-auto">Setting</p>
                                        </a>
                                    </li>
                                    <li class="nav-item me-4">
                                        <a class="d-flex text-decoration-none fw-bold text-secondary" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <img src="/image/icon/logout.svg" alt="logout" srcset="">
                                            <p class="ms-2 my-auto">{{ __('Logout') }}</p>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav> 
            <main class="py-4" style="min-height:100vh">
                @yield('content')
            </main>

            @yield('footer')
        </div>
        
    </div>
    @yield('page-script')
</body>
</html>
