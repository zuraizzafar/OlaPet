<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body onload="body_load_complete()">
    <div id="wrapper">
        <div id="app" class="container-fluid">
            <div class="pade-loader w-100 h-100 position-fixed top-0 start-0 justify-content-center align-items-center bg-white">
                <lottie-player src="{{ asset('lottiefiles/loader.json') }}" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
            </div>
            <div class="row">
                <div class="col-2 col-md-3 px-0">
                    <div class="d-flex flex-column flex-shrink-0 p-2 p-md-3 bg-white me-sm-5 vh-100 overflow-auto">
                        <a href="{{ route('admin_dashboard') }}" class="d-flex justify-content-center text-center align-items-center mt-2 mt-md-0 mb-md-0 me-md-auto link-dark text-decoration-none">
                            <i class="fa-solid fa-cloud-meatball fa-2x me-md-2"></i>
                            <span class="fs-4 d-none d-md-inline">Dashboard</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item mb-2">
                                <a href="{{ route('admin_dashboard') }}" class="nav-link text-center m-0 text-md-start link-dark @if(Route::currentRouteName()=='admin_dashboard') active @endif" aria-current="page">
                                    <i class="fa-solid fa-house me-md-2"></i>
                                    <span class="d-none d-md-inline">Home</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('home') }}" class="nav-link text-center m-0 text-md-start link-dark @if(Route::currentRouteName()=='home') active @endif" aria-current="page">
                                    <i class="bi bi-grid-fill me-md-2"></i>
                                    <span class="d-none d-md-inline">Ads</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="{{ route('admin_notifications') }}" class="nav-link text-center m-0 text-md-start link-dark @if(Route::currentRouteName()=='admin_notifications') active @endif" aria-current="page">
                                    <i class="fa-solid fa-bullhorn me-md-2"></i>
                                    <span class="d-none d-md-inline">Boradcast Notifications</span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center justify-content-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-2x me-md-2"></i>
                                <strong class="d-none d-md-inline">{{ Auth::user()->name }}</strong>
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-9 vh-100 py-3 overflow-auto">
                    <h3 class="text-dark">@yield('title', 'Home')</h3>
                    <hr>
                    <main class="py-2">
                        @yield('content')
                    </main>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
</body>

</html>