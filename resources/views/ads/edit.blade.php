@extends('layouts.app')

@section('title', 'Edit Ad')

@section('content')
<div class="container shadow-lg bg-white mt-5 rounded-md profile-page-section">
    <form action="{{ route('update_ad') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $ad->id }}">
        <div class="row">
            <div class="col-12 px-0">
                <div class="choose-images-banner position-relative">
                    <div id="selected-images-banner">
                        @foreach($ad->images as $image)
                        <div class="item"><img src="{{ Storage::disk('s3')->temporaryUrl($image->url, now()->addMinutes(5) ) }}" alt="{{ $image->alt }}"></div>
                        @endforeach
                    </div>
                    <input type="file" name="images[]" id="ad_images" class="d-none" multiple accept="image/*">
                    <button class="btn btn-primary btn-add-images">
                        <i class="fa-solid fa-camera"></i>
                        <span class="d-none d-md-inline">
                            Add Images
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="set-banner-ad">
                    <input type="file" name="image" id="ad_banner_image" class="d-none" accept="image/*">
                    <button class="set-banner-for-ad" style="background-image: url({{ Storage::disk('s3')->temporaryUrl($ad->banner->url, now()->addMinutes(5) ) }});">
                        <i class="fa-solid fa-camera fa-4x"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-9 row py-4">
                <div class="col-md-5 py-2">
                    <label class="fw-bold" for="title">Ad Title</label>
                    <input required type="text" name="title" class="w-100 form-control" placeholder="Enter Title for your Ad..." value="{{ $ad->title }}">
                </div>
                <div class="col-md-5 py-2">
                    <label class="fw-bold" for="category">Select Category</label>
                    <select type="text" class="form-control" id="category" name="category">
                        <option value="">Select Category</option>
                        @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" @if($category->id==$ad->cat_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="fw-bold" for="price">Asking Price</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-rupee-sign"></i>
                        </span>
                        <input required type="number" name="price" class="form-control h-100" placeholder="Enter asking Price..." value="{{ $ad->price }}">
                    </div>
                </div>
                <div class="col-12 py-2">
                    <div class="form-group">
                        <label class="fw-bold" for="short_description">Short Description</label>
                        <textarea class="form-control" name="short_description" rows="8" placeholder="Type in a short description...">{{ $ad->short_d }}</textarea>
                    </div>
                </div>
                <div class="col-12 py-2">
                    <div class="form-group">
                        <label class="fw-bold" for="long_description">Long Description</label>
                        <textarea class="ckeditor form-control" name="long_description" rows="8">{{ $ad->long_d }}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="px-4 py-2 my-3 me-3 rounded-pill btn btn-success">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i>
                        Update
                    </button>
                    <a href="{{ url()->previous() }}" type="submit" class="px-4 py-2 my-3 rounded-pill btn btn-light">
                        <i class="fa-solid fa-xmark me-2"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>


</div>
@endsection