@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="container-fluid bg-white bg-banner-sm">
    <div class="row justify-content-center min-vh-100">
        <div class="col-md-6 align-self-center">
            <div class="text-center pb-4">
                <a href="{{ route('home') }}">
                    <img class="col-5 col-md-3" src="{{ get_file_path('logo.png', get_drive_content()) }}" alt="{{ config('app.name', 'Laravel') }}">
                </a>
            </div>
            <form class="row justify-content-center" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3 col-md-7">
                    <label for="name" class="text-start">
                        {{ __('Full Name') }} :
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input id="name" type="text" class="form-control my-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name..." required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 col-md-7">
                    <label for="email" class="text-start">
                        {{ __('E-Mail Address') }} :
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            @
                        </span>
                        <input id="email" type="email" class="form-control my-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email..." required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 col-md-7">
                    <label for="password" class="text-start">
                        {{ __('Password') }} :
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input id="password" type="password" class="form-control my-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password...">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 col-md-7">
                    <label for="password-confirm" class="text-start">
                        {{ __('Confirm Password') }} :
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password-confirm" type="password" class="form-control my-0 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password...">
                    </div>
                </div>

                <div class="my-3 col-md-7">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">
                        {{ __('Register') }} <i class="fas fa-sign-in-alt"></i>
                    </button>
                </div>

                <div class="mb-2 col-md-7 text-center">
                    <small>Already have an account? <a href="{{ route('login') }}">Login.</a> </small>
                </div>

                <div class="col-md-7 text-center">
                    <small> 
                        <a href="{{ route('home') }}">Home</a> 
                        <a href="#">Contact Us</a>
                        <a href="#">Privacy Policy</a>
                    </small>
                </div>
                
                <div class="col-md-7 text-center">
                    <small> 
                        <i class="far fa-copyright"></i> 2022 <a class="text-decoration-none" href="{{ route('home') }}">OlaPet</a>, All rights reserved.
                    </small>
                </div>
            </form>
        </div>
        <div class="d-none d-md-block col-md-6 bg-pattern position-relative">
            &nbsp;
            <a href="{{ url()->previous() }}" class="position-absolute text-white end-0 m-3">
                <i class="fas fa-times fa-2x"></i>
            </a>
        </div>
    </div>
</div>
@endsection