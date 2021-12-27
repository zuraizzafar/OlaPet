<?php

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

$ui_mode = session('ui_mode', 'light');
$notifications = Notification::whereIn('target', [Auth::user()->type??0, 2])->get();
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pet Shop') - {{ config('app.name', 'OlaPet') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="@if($ui_mode=='dark') {{ 'bg-dark-seconday' }} @endif">
    <div id="app">
        <div class="pade-loader w-100 h-100 position-fixed top-0 start-0 @if($ui_mode=='dark') {{ 'bg-dark' }} @else {{ 'bg-white' }} @endif justify-content-center align-items-center">
            <lottie-player src="{{ asset('lottiefiles/loader.json') }}" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </div>
        <nav class="navbar navbar-expand-md @if($ui_mode=='light') {{ 'navbar-light bg-white shadow-sm' }} @else {{ 'navbar-dark bg-dark shadow' }} @endif sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand col-4 col-md-2" href="{{ route('home') }}">
                    <img class="w-50" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Center Right Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        @if(Auth::user())
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bi bi-stickies-fill fs-4 mx-1 lh-1"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-plus-square fs-4 mx-1"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-bell fs-4 mx-1"></i></a>

                            <ul class="notifification-dropdown dropdown-menu dropdown-menu-start @if($ui_mode=='dark') {{ 'dropdown-menu-dark' }} @endif" aria-labelledby="navbarDropdown">
                                @if(count($notifications))
                                    @foreach($notifications as $notification)
                                    <li class="text-right mx-1 px-2 border-bottom">
                                        <span class="d-block">
                                            {{ $notification->notification }}
                                        </span>
                                        <small class="d-block text-muted">
                                            {{ date( 'h:i a M, Y', strtotime($notification->updated_at)) }}
                                        </small>
                                    </li>
                                    @endforeach
                                @else
                                <li class="text-center">
                                    <small>
                                        No notifications found.
                                    </small>
                                </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bi bi-chat-text-fill fs-4 mx-1 lh-1"></i>
                            </a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ route('ui_mode') }}">
                                @if($ui_mode=='dark')
                                <i class="bi bi-brightness-high-fill fs-4 mx-1 lh-1"></i>
                                @else
                                <i class="bi bi-moon-fill fs-4 mx-1 lh-1"></i>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="">
                                <i class="fas fa-store fs-4 me-2"></i>
                                {{ __('OlaPet Mall') }}
                            </a>
                        </li>
                        <!-- Authentication Links -->
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end @if($ui_mode=='dark') {{ 'dropdown-menu-dark' }} @endif" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/script.js') }}" defer></script>
</body>

</html>