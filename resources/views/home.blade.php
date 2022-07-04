@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid pb-5">
    <div class="row pb-3 mb-4 mt-sm-0 mt-4 border-bottom p-4">
        <div class="col-sm-6 text-start">
            <span class="text-muted">
                Home / <a href="{{ route('search_ads') }}">Ads</a>
            </span>
        </div>
        <div class="col-sm-6 text-end">
            <span class="text-muted me-3">
                Top Ads (Hot new Ads)
            </span>
        </div>
    </div>
    <div class="row p-4">
        @foreach($all_ads as $ad)
        <div class="col-sm-6 col-md-3 mb-4 px-3">
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
                                @if(count($ad->user->addresses) > 0)
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
        @endforeach
    </div>
    <div class="text-center">
        <a href="{{ route('search_ads') }}" class="btn btn-primary rounded shadow px-4 btn-lg">
            Load More
        </a>
    </div>
</div>
@endsection