<div class="modal fade" id="loginToggle" aria-hidden="true" aria-labelledby="loginToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="container-fluid bg-white bg-banner-sm">
                    <div class="row justify-content-center min-vh-100">
                        <div class="col-md-6 align-self-center">
                            <div class="text-center pb-4">
                                <a href="{{ route('home') }}">
                                    <img class="col-5 col-md-3" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                                </a>
                            </div>
                            <form class="row justify-content-center" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3 col-md-7">
                                    <label for="email" class="text-start">
                                        {{ __('E-Mail Address') }} :
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            @
                                        </span>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-7">
                                    <div class="form-check cursor-pointer">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-2 col-md-7">
                                    <button type="submit" class="btn btn-primary w-100 rounded-pill">
                                        {{ __('Login') }} <i class="fas fa-sign-in-alt"></i>
                                    </button>
                                </div>
                                <div class="mb-2 col-md-7 text-center">
                                    @if (Route::has('password.request'))
                                    <small> <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a> </small>
                                    @endif
                                </div>
                                <div class="mb-2 col-md-7 text-center">
                                    <small>Dont have an account? <a href="javascript:void(0)" data-bs-target="#signupToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Register.</a> </small>
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
                            <a href="#" class="position-absolute text-white end-0 m-3" data-bs-dismiss="modal">
                                <i class="fas fa-times fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="signupToggle" aria-hidden="true" aria-labelledby="signupToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="container-fluid bg-banner-sm">
                    <div class="row justify-content-center min-vh-100">
                        <div class="col-md-6 align-self-center">
                            <div class="text-center pb-4">
                                <a href="{{ route('home') }}">
                                    <img class="col-5 col-md-3" src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
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
                                        <input id="name" pattern="[a-zA-Z]+" title="Please enter a valid name" type="text" class="form-control my-0 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name..." required autocomplete="name" autofocus>

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
                                    <small>Already have an account? <a href="javascript:void(0)" data-bs-target="#loginToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Login.</a> </small>
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
                            <a href="#" class="position-absolute text-white end-0 m-3" data-bs-dismiss="modal">
                                <i class="fas fa-times fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>