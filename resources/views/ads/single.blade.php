@extends('layouts.app')

@section('title', $ad->name)

@section('content')
<div class="container shadow-lg bg-white mt-5 rounded-md profile-page-section">
    <div class="row">
        <div class="col-12 px-0">
            <div class="choose-images-banner position-relative">
                <div id="selected-images-banner">
                    @foreach($ad->images as $image)
                    <div class="item"><img src="{{ Storage::disk('s3')->temporaryUrl($image->url, now()->addMinutes(5) ) }}" alt="{{ $image->alt }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3 row">
            <div class="set-banner-ad">
                <img class="set-banner-for-ad p-0 shadow" style="width: 256px; height: 256px; object-fit: contain;" src="{{ Storage::disk('s3')->temporaryUrl($ad->banner->url, now()->addMinutes(5) ) }}" alt="{{ $ad->banner->alt }}">
            </div>
            <div class="col-12 pb-4 px-md-4">
                <span class="fw-bold d-block fs-4 mb-1 mt-2 text-center">
                    Seller Details
                </span>
                <div class="mt-2 mb-4 text-center">
                    <img src="{{ Storage::disk('s3')->temporaryUrl(App\Models\Media::where('id', $ad->user->image)->get()->first()->url, now()->addMinutes(5) ) }}" alt="" class="rounded-circle mx-auto shadow border" style="width: 162px; object-fit: cover; height: 162px;">
                </div>
                <div class="mt-2">
                    <span class="fw-bold d-block">
                        <i class="fa-solid fa-circle-user me-2"></i>
                        Name
                    </span>
                    <span>{{ $ad->user->name }}</span>
                </div>
                <div class="mt-2">
                    <span class="fw-bold d-block">
                        <i class="fa-solid fa-phone me-2"></i>
                        Phone
                    </span>
                    <a href="tel: {{ $ad->user->primary_address->phone }}">{{ $ad->user->primary_address->phone }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 row py-4 ps-md-5">
            <div class="col-md-5 py-2">
                <span class="m-0 fs-3 fw-bold">{{ $ad->title }}</span>
            </div>
            <div class="col-md-7 py-2">
                <div class="d-flex justify-content-end ps-md-5">
                    <a href="tel: {{ $ad->user->primary_address->phone }}" class="btn btn-primary px-4 rounded-pill mx-2">
                        <i class="fa-solid fa-phone me-2"></i>
                        Call
                    </a>
                    <a href="mailto: {{ $ad->user->email }}" class="btn btn-primary px-4 rounded-pill mx-2">
                        <i class="fa-solid fa-envelope me-2"></i>
                        Email
                    </a>
                    @if($ad->user->id == Auth::id())
                    <a href="{{ route('edit_ad', $ad->id) }}" class="btn btn-primary px-4 rounded-pill mx-2">
                        <i class="fa-solid fa-pencil me-2"></i>
                        Edit
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-md-12 py-2">
                <span class="fw-bold d-block fs-5 mb-1 mt-2" for="category">Category</span>
                <span>{{ $ad->category->name }}</span>
            </div>
            <div class="col-md-12">
                <span class="fw-bold d-block fs-5 mb-1 mt-2" for="price">Asking Price</span>
                <span class="rounded bg-light border px-3 py-2 d-inline-block">
                    <i class="fa-solid fa-rupee-sign"></i>
                </span>
                <span>{{ $ad->price }}</span>
            </div>
            <div class="col-12 py-2">
                <div class="form-group">
                    <span class="fw-bold d-block fs-5 mb-1 mt-2" for="short_description">Short Description</span>
                    <p class="m-0">
                        {{ $ad->short_d }}
                    </p>
                </div>
            </div>
            <div class="col-12 py-2">
                <div class="form-group">
                    <span class="fw-bold d-block fs-5 mb-1 mt-2" for="long_description">Long Description</span>
                    <div>
                        {!! $ad->long_d !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection