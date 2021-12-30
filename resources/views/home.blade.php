@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid px-0">
    <div class="home-banner-slider owl-carousel">
        <div class="item home-slide home-slide-1 min-vh-50 py-5 text-center row mx-0 align-content-center">
            <div class="col-12">
                <h2>Your perfect online Pet store</h2>
                <p class="text-white">Buy pets products at one stop, visit OlaPet Mall now!</p>
                <a href="#" class="btn btn-primary">Olapet Mall</a>
            </div>
        </div>
        <div class="item home-slide home-slide-2 min-vh-50 p-5 text-left row mx-0 align-content-center">
            <div class="col-12">
                <h2>Find perfect match!</h2>
                <p class="text-dark">Find pets that are for you! Watch for OlaPet ads section.</p>
            </div>
        </div>
        <div class="item home-slide home-slide-3 min-vh-50 py-5 text-center text-primary row mx-0 align-content-center">
            <div class="col-12">
                <h2>Watchout for sales!</h2>
                <p class="text-dark">Avail discounts on your favorite products.</p>
                @if(!Auth::user())
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a> or <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection