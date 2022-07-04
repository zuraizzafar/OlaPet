@extends('layouts.app')

@section('title', 'Search Ads')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar p-4 py-5 bg-white shadow-sm">
            <form action="{{ route('search_ads') }}" class="search-ads-form">
                <div class="filters mb-5">
                    <h3 class="side-bar-heading text-justify mb-4">Filters <i class="fa-solid fa-filter"></i></h3>
                    <label class="form-label d-block" for="min-price-range">
                        <input type="hidden" name="s" value="{{ isset($_GET['s'])?$_GET['s']:'' }}" class="form-control rounded-pill pe-5" placeholder="Search ads..." aria-label="Search">
                        <span>Minimum Price: </span>
                        <span class="value-min-price">0</span>
                    </label>
                    <div class="range">
                        <input type="range" name="price_1" class="form-range" id="min-price-range" min="0" max="500000" value="0" />
                    </div>
                    <label class="form-label d-block" for="max-price-range">
                        <span>Maximum Price: </span>
                        <span class="value-max-price">500000</span>
                    </label>
                    <div class="range">
                        <input type="range" name="price_2" class="form-range" min="0" max="500000" value="500000" id="max-price-range" />
                    </div>
                </div>
                <div class="location mb-3">
                    <h3 class="side-bar-heading text-justify mb-4">Location <i class="fa-solid fa-location-dot"></i></h3>
                    <div class="input-group mb-3">
                        <select class="form-select" name="location">
                            @foreach (App\Models\City::all() as $city)
                            <option value="{{ $city->id }}" @if(isset($_GET['location'])) @if($_GET['location'] == $city->id) selected @endif @endif>{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <button class="btn btn-info w-100 shadow my-3">
                        <i class="fa-solid fa-location-dot"></i> Current Location
                    </button> -->
                </div>
                <button class="btn btn-primary w-100 shadow my-3">
                    <i class="fa-solid fa-magnifying-glass me-3"></i> Search
                </button>
                <div class="alert alert-success mt-5" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>
        </div>
        </form>
        <div class="col-md-9 p-md-5">
            <div class="row pb-3 mb-4 mt-sm-0 mt-4 border-bottom">
                <div class="col-sm-6 text-start">
                    <span class="text-muted">
                        Home / Search / {{ $request->s }}
                    </span>
                </div>
                <!-- <div class="col-sm-6 text-end">
                    <span class="text-muted me-3">
                        Sort Ads:
                    </span>
                    <button class="btn shadow-sm btn-light bg-white">
                        <i class="fa-solid Choose+Location...fa-arrow-down-a-z"></i>
                    </button>
                    <button class="btn shadow-sm btn-light bg-white">
                        <i class="fa-solid fa-arrow-down-short-wide"></i>
                    </button>
                </div> -->
            </div>
            <div class="row">
                @foreach($ads as $ad)
                @if((isset($_GET['location']) && $ad->user->primary_address->city == $request->location) || (!isset($_GET['location'])))
                <div class="col-sm-4 mb-4 px-3">
                    <a class="text-decoration-none text-dark" href="{{route('single_ad', $ad->id)}}">
                        <div class="card shadow-sm rounded">
                            <!-- <img src="{{ Storage::disk('s3')->temporaryUrl('images/pexels-lumn-406014.jpg', now()->addMinutes(5) ) }}" class="card-img-top" alt="{{ Storage::disk('s3')->path('images/pexels-lumn-406014.jpg') }}"> -->
                            <img class="rounded-top ad-card-img" src="{{ Storage::disk('s3')->temporaryUrl($ad->banner->url, now()->addMinutes(5) ) }}" alt="{{ $ad->banner->alt }}">
                            <div class="card-body" style="min-height: 70px">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="card-title m-0">{{ $ad->title }}</h6>
                                    </div>
                                    <div class="col-4 px-0">
                                        <i class="fa-solid fa-rupee-sign"></i>
                                        <span>{{ $ad->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">
                                            <i class="fas fa-user"></i>
                                            <span>{{ $ad->user->name }}</span>
                                        </small>
                                    </div>
                                    <div class="col-6">
                                        @if(isset($ad->user->primary_address))
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $ad->user->primary_address->address }}
                                        </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
            <!-- <div class="text-center">
                <button class="btn btn-primary rounded shadow px-4 btn-lg">
                    <i class="fa-solid fa-spinner fa-spin me-3"></i>
                    Load More
                </button>
            </div> -->
        </div>
    </div>
</div>

@endsection