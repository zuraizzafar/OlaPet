@extends('layouts.app')

@section('title', 'My Ads')

@section('content')

@php
$ads = App\Models\Ad::where('user_id', Auth::id())->with(['banner', 'images', 'user', 'sold'])->orderBy('created_at', 'DESC')->get();
@endphp

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
            @foreach($ads as $ad)
            <a href="{{route('single_ad', $ad->id)}}" class="col-md-5 position-relative mb-5 mx-sm-4 btn btn-light my-ads py-0 border-0 single-ad position-relative rounded-md">
                <div class="row">
                    <div class="col-4 px-0">
                        <img class="w-100 h-100 object-fit-cover" style="height: 168px !important" src="{{ Storage::disk('s3')->temporaryUrl($ad->banner->url, now()->addMinutes(5) ) }}" alt="{{ $ad->banner->alt }}">
                    </div>
                    <div class="col-8 p-3 text-start">
                        <h3>
                            {{ $ad->title }}
                        </h3>
                        <span class="text-muted"> <strong> Posted on:</strong> {{ date( "d M Y" , strtotime($ad->updated_at)) }} </span>
                        <p class="m-0">
                            {{ strlen($ad->short_d) > 50 ? substr($ad->short_d,0,50)."..." : $ad->short_d }}
                        </p>
                        <p class="text-end m-0 text-muted">
                            <i class="fa-solid fa-rupee-sign me-2"></i>
                            {{ $ad->price }}
                        </p>
                        @if($ad->sold_to != NULL)
                        <p class="text-start m-0 text-muted" title="Sold To">
                            <i class="fa-solid fa-gavel"></i>
                            <strong>Sold To: </strong>
                            {{ $ad->sold->name }}
                        </p>
                        @endif
                    </div>
                </div>
                <button class="btn ad-delete-button pe-2 pt-0" data-id="{{ $ad->id }}">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </a>
            @endforeach
        </div>
    </div>
</div>

@endsection