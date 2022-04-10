<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

$ui_mode = session('ui_mode', 'light');
extract($data);
$notifications = Notification::where('status', 1)->whereIn('target', [Auth::user()->type ?? 0, 2])->where(function ($query) {
    $query->where('target_user', null)->orWhere('target_user', Auth::id());
})->orderBy('updated_at', 'desc')->get();
?>
@include('scripts.header')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pet Shop') - {{ config('app.name', 'OlaPet') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Poppins" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @include('scripts.styles')
</head>

<body class="@if($ui_mode=='dark') {{ 'dark-mode-on bg-dark-seconday' }} @endif route_{{ Route::currentRouteName() }}" onload="body_load_complete()">
    <div id="app">
        <div class="pade-loader w-100 h-100 position-fixed top-0 start-0 @if($ui_mode=='dark') {{ 'bg-dark' }} @else {{ 'bg-white' }} @endif justify-content-center align-items-center">
            <lottie-player src="{{ asset('lottiefiles/loader.json') }}" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
        @if(!in_array(Route::currentRouteName(), $nav_off))
        <nav class="navbar navbar-expand-md @if($ui_mode=='light') {{ 'navbar-light bg-white shadow-sm' }} @else {{ 'navbar-dark bg-dark shadow' }} @endif sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand col-4 col-md-2" href="{{ route('home') }}">
                    <img style="width: 50%;" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <div class="search-input d-none d-md-block col-md-4 col-lg-3">
                    <form action="" class="search-ads-form">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control rounded-pill pe-5" placeholder="Search ads..." aria-label="Search">
                            <div class="input-group-append position-absolute end-0">
                                <button class="btn btn-primary rounded-circle" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <button class="navbar-toggler border-0 outline-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fas fa-ellipsis-v"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Center Right Of Navbar -->
                    <ul class="navbar-nav mx-auto flex-row justify-content-around">
                        @if(Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="" title="My Ads">
                                <i class="bi bi-grid-fill fs-4 mx-1 lh-1"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" title="New Ad">
                                <i class="fas fa-circle-plus fs-4 mx-1"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle notification-button" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Notifications">
                                <i class="fas fa-bell fs-4"></i>
                                <span class="notification-bubble position-absolute top-0 start-50 translate-middle p-1 bg-danger border border-light rounded-circle" @if(!count($notifications)) style="display: none" @elseif((strtotime($notifications[0]->updated_at))<(strtotime(Auth::user()->notification_read_at))) style="display: none" @endif>
                                        <span class="visually-hidden">New alerts</span>
                                </span>
                            </a>

                            <ul class="notifification-dropdown dropdown-menu position-absolute dropdown-menu-start @if($ui_mode=='dark') {{ 'dropdown-menu-dark' }} @endif" aria-labelledby="navbarDropdown">
                                @if(count($notifications))
                                @foreach($notifications as $notification)
                                <li class="text-right mx-1 px-2 border-bottom" data-datetime="{{ strtotime($notification->updated_at) }}">
                                    <span class="d-block">
                                        {{ $notification->notification }}
                                    </span>
                                    <small class="d-block text-muted">
                                        {{ date( 'M d, Y', strtotime($notification->updated_at)) }}
                                    </small>
                                </li>
                                @endforeach
                                @else
                                <li class="text-right mx-1 px-2 border-bottom d-none" data-datetime="1609459200">
                                    <span class="d-block">
                                        Test for all
                                    </span>
                                    <small class="d-block text-muted">
                                        Jan 01, 2021
                                    </small>
                                </li>
                                <li class="text-center no-notifications">
                                    <small>
                                        No notifications found.
                                    </small>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" title="Chats">
                                <i class="fa-solid fa-comment-dots fs-4 mx-1"></i>
                            </a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center flex-row justify-content-around">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('ui_mode') }}" title="Switch Mode">
                                @if($ui_mode=='dark')
                                <i class="bi bi-brightness-high-fill fs-4 mx-1 lh-1"></i>
                                @else
                                <i class="bi bi-moon-fill fs-4 mx-1 lh-1"></i>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item d-md-none d-lg-inline-block">
                            <a class="nav-link d-flex align-items-center" href="">
                                <i class="fas fa-store fs-4 me-2"></i>
                                {{ __('OlaPet Mall') }}
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link login-link" data-bs-toggle="modal" href="#loginToggle">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link register-link" data-bs-toggle="modal" href="#signupToggle">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fs-2"></i>
                            </a>

                            <ul class="dropdown-menu profile-dropdown position-absolute dropdown-menu-end @if($ui_mode=='dark') {{ 'dropdown-menu-dark' }} @endif" aria-labelledby="navbarDropdown">
                                <li class="px-3 py-2 mb-2 border-bottom">
                                    {{ Auth::user()->name }}
                                </li>
                                @if(Auth::user()->type==1)
                                <li>
                                    <a class="dropdown-item" href="{{ route('seller_dashboard') }}">
                                        {{ __('Seller Dashboard') }}
                                    </a>
                                </li>
                                @endif
                                @if(Auth::user()->type==2)
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin_dashboard') }}">
                                        <i class="fa-solid fa-gauge-high me-2"></i>
                                        {{ __('Admin Dashboard') }}
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endif

        @if(in_array(Route::currentRouteName(), $banner_on))
        <div class="container-fluid px-0">
            <div class="home-banner-slider owl-carousel">
                <div class="item home-slide home-slide-1 min-vh-65 py-5 text-center row mx-0 align-content-center">
                    <div class="col-12">
                        <h2>Your perfect online Pet store</h2>
                        <p class="text-white">Buy pets products at one stop, visit OlaPet Mall now!</p>
                    </div>
                </div>
                <div class="item home-slide home-slide-2 min-vh-65 py-5 text-center text-sm-left row mx-0 align-content-center">
                    <div class="col-12">
                        <h2>Find perfect match!</h2>
                        <p class="text-dark">Find pets that are for you! Watch for OlaPet ads section.</p>
                    </div>
                </div>
                <div class="item home-slide home-slide-3 min-vh-65 py-5 text-center text-primary row mx-0 align-content-center">
                    <div class="col-12">
                        <h2>Watchout for sales!</h2>
                        <p class="text-dark">Avail discounts on your favorite products.</p>
                        @if(!Auth::user())
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#loginToggle">Login</a> or <a class="btn btn-primary" data-bs-toggle="modal" href="#signupToggle">Register</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-primary py-5">
                <div class="row position-relative">
                    <div class="col-sm-10 col-md-6 mx-auto banner-search shadow p-4">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control shadow-sm px-4 py-3" type="text" placeholder="Type in keywords..." aria-label=".form-control-lg example">
                                </div>
                                <div class="col-6 col-md-3 px-md-0">
                                    <div class="input-group input-group-lg shadow-sm">
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Select Category...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <button class="btn py-3 w-100 btn-primary shadow">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
        </div>
        @endif

        <main>
            @yield('content')
        </main>
        @include('auth.modals')
        <footer>

        </footer>
    </div>

    <script src="{{ asset('js/script.js') }}" defer></script>
    @if(Auth::user())
    @include('scripts.notifications')
    @endif
    @include('scripts.scripts')
</body>

</html>