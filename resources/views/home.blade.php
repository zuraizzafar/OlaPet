@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar py-4 bg-white shadow-sm">
            <div class="filters mb-5">
                <h3 class="side-bar-heading text-justify mb-4">Filters <i class="fa-solid fa-filter"></i></h3>
                <label class="form-label d-block" for="min-price-range">
                    <span>Minimum Price: </span>
                    <span class="value-min-price">0</span>
                </label>
                <div class="range">
                    <input type="range" class="form-range" id="min-price-range" min="0" max="4500" value="0" />
                </div>
                <label class="form-label d-block" for="max-price-range">
                    <span>Maximum Price: </span>
                    <span class="value-max-price">4500</span>
                </label>
                <div class="range">
                    <input type="range" class="form-range" min="0" max="4500" value="4500" id="max-price-range" />
                </div>
            </div>
            <div class="location mb-5">
                <h3 class="side-bar-heading text-justify mb-4">Location <i class="fa-solid fa-location-dot"></i></h3>
                <div class="input-group mb-3">
                    <select class="form-select">
                        <option selected>Choose Location...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <button class="btn btn-primary w-100 shadow my-3">
                    <i class="fa-solid fa-location-dot"></i> Current Location
                </button>
            </div>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        </div>
        <div class="col-md-9 p-md-5">
            <div class="row pb-3 mb-4 border-bottom">
                <div class="col-sm-6 text-start">
                    <span class="text-muted">
                        Home / Location / <a href="#">Ads</a>
                    </span>
                </div>
                <div class="col-sm-6 text-end">
                    <span class="text-muted me-3">
                        Sort Ads:
                    </span>
                    <button class="btn shadow-sm btn-light bg-white">
                        <i class="fa-solid fa-arrow-down-a-z"></i>
                    </button>
                    <button class="btn shadow-sm btn-light bg-white">
                        <i class="fa-solid fa-arrow-down-short-wide"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                @for($i=0; $i<=13; $i++) <div class="col-sm-4 mb-4 px-3">
                    <a class="text-decoration-none text-dark" href="javascript:void(0)">
                        <div class="card shadow-sm rounded">
                            <!-- <img src="{{ Storage::disk('s3')->temporaryUrl('images/pexels-lumn-406014.jpg', now()->addMinutes(5) ) }}" class="card-img-top" alt="{{ Storage::disk('s3')->path('images/pexels-lumn-406014.jpg') }}"> -->
                            <img class="rounded-top" src="{{ asset('images/pexels-lumn-406014.jpg') }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="card-title">Ad title</h6>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa-solid fa-rupee-sign"></i> 150
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">
                                            <i class="fas fa-user"></i> Seller Name
                                        </small>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i> Location, State.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
            @endfor
        </div>
        <div class="text-center">
            <button class="btn btn-primary rounded shadow px-4 btn-lg">
                <i class="fa-solid fa-spinner fa-spin me-3"></i>
                Load More
            </button>
        </div>
    </div>
</div>
</div>
@endsection