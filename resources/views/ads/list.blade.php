@extends('layouts.app')

@section('title', 'My Ads')

@section('content')

<div class="mx-5 shadow-lg bg-white mt-5 rounded-xl">
    <div class="pt-5 pb-0">
        <h2 class="text-center my-4">My Ads</h2>
    </div>
    <div class="container pb-5 px-md-5">
        <div class="text-end me-5 mb-5 pe-5">
            <a href="{{ route('create_ad') }}" class="btn btn-primary py-2 px-4 rounded-pill">
                <i class="fa-solid fa-plus me-2"></i>
                Create Ads
            </a>
        </div>
        <div class="row justify-content-around2">
            <div class="col-md-5 position-relative mb-5 mx-sm-4 btn btn-light my-ads py-0 border-0 single-ad position-relative rounded-md">
                <div class="row">
                    <div class="col-4 px-0">
                        <img class="w-100 h-100 object-fit-cover" src="{{ asset('images/pexels-lumn-406014.jpg') }}">
                    </div>
                    <div class="col-8 p-3 text-start">
                        <h3>Ad Title</h3>
                        <span class="text-muted"> <strong> Posted on:</strong> 20 December 2021 </span>
                        <p class="m-0">
                            Lorem ipsum dolor sit amet, sit amet adipisicing elit.
                        </p>
                        <p class="text-end m-0 text-muted">
                            <i class="fa-solid fa-eye me-2"></i>
                            13    
                        </p>
                    </div>
                </div>
                <button class="btn ad-delete-button pe-2 pt-0">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
            <div class="col-md-5 position-relative mb-5 mx-sm-4 btn btn-light my-ads py-0 border-0 single-ad position-relative rounded-md">
                <div class="row">
                    <div class="col-4 px-0">
                        <img class="w-100 h-100 object-fit-cover" src="{{ asset('images/pexels-lumn-406014.jpg') }}">
                    </div>
                    <div class="col-8 p-3 text-start">
                        <h3>Ad Title</h3>
                        <span class="text-muted"> <strong> Posted on:</strong> 20 December 2021 </span>
                        <p class="m-0">
                            Lorem ipsum dolor sit amet, sit amet adipisicing elit.
                        </p>
                        <p class="text-end m-0 text-muted">
                            <i class="fa-solid fa-eye me-2"></i>
                            13    
                        </p>
                    </div>
                </div>
                <button class="btn ad-delete-button">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
            <div class="col-md-5 position-relative mb-5 mx-sm-4 btn btn-light my-ads py-0 border-0 single-ad position-relative rounded-md">
                <div class="row">
                    <div class="col-4 px-0">
                        <img class="w-100 h-100 object-fit-cover" src="{{ asset('images/pexels-lumn-406014.jpg') }}">
                    </div>
                    <div class="col-8 p-3 text-start">
                        <h3>Ad Title</h3>
                        <span class="text-muted"> <strong> Posted on:</strong> 20 December 2021 </span>
                        <p class="m-0">
                            Lorem ipsum dolor sit amet, sit amet adipisicing elit.
                        </p>
                        <p class="text-end m-0 text-muted">
                            <i class="fa-solid fa-eye me-2"></i>
                            13    
                        </p>
                    </div>
                </div>
                <button class="btn ad-delete-button">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
            <div class="col-md-5 position-relative mb-5 mx-sm-4 btn btn-light my-ads py-0 border-0 single-ad position-relative rounded-md">
                <div class="row">
                    <div class="col-4 px-0">
                        <img class="w-100 h-100 object-fit-cover" src="{{ asset('images/pexels-lumn-406014.jpg') }}">
                    </div>
                    <div class="col-8 p-3 text-start">
                        <h3>Ad Title</h3>
                        <span class="text-muted"> <strong> Posted on:</strong> 20 December 2021 </span>
                        <p class="m-0">
                            Lorem ipsum dolor sit amet, sit amet adipisicing elit.
                        </p>
                        <p class="text-end m-0 text-muted">
                            <i class="fa-solid fa-eye me-2"></i>
                            13    
                        </p>
                    </div>
                </div>
                <button class="btn ad-delete-button">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection