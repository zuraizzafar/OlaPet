@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<?php
$user_type = array(
    'Buyer',
    'Seller',
    'Admin',
);
?>
<style>
    .select2-container {
        z-index: 99999999;
    }
</style>
<div class="container py-md-5 shadow-lg bg-white mt-5 px-md-5 rounded-md profile-page-section">
    <div class="row align-items-start">
        <div class="nav flex-column nav-pills col-sm-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link m-1 fw-bold text-start px-4 active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                <i class="fa-solid fa-user me-2"></i>
                Profile
            </button>
            <button class="nav-link m-1 fw-bold text-start px-4" id="v-pills-addresses-tab" data-bs-toggle="pill" data-bs-target="#v-pills-addresses" type="button" role="tab" aria-controls="v-pills-addresses" aria-selected="true">
                <i class="fa-solid fa-location-dot me-2"></i>
                Addresses
            </button>
            <button class="nav-link m-1 fw-bold text-start px-4" id="v-pills-ads-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ads" type="button" role="tab" aria-controls="v-pills-ads" aria-selected="true">
                <i class="fa-solid fa-parachute-box me-2"></i>
                Manage Ads
            </button>
            <button class="nav-link m-1 fw-bold text-start px-4" id="v-pills-wallet-tab" data-bs-toggle="pill" data-bs-target="#v-pills-wallet" type="button" role="tab" aria-controls="v-pills-wallet" aria-selected="true">
                <i class="fa-solid fa-wallet me-2"></i>
                Wallet
            </button>
            <button class="nav-link m-1 fw-bold text-start px-4" id="v-pills-favorites-tab" data-bs-toggle="pill" data-bs-target="#v-pills-favorites" type="button" role="tab" aria-controls="v-pills-favorites" aria-selected="true">
                <i class="fa-solid fa-heart me-2"></i>
                Favorite Ads
            </button>
            <button class="nav-link m-1 fw-bold text-start px-4" id="v-pills-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-history" type="button" role="tab" aria-controls="v-pills-history" aria-selected="true">
                <i class="fa-solid fa-clock-rotate-left me-2"></i>
                History
            </button>
            <button class="nav-link m-1 fw-bold text-start px-4" id="v-pills-followed-tab" data-bs-toggle="pill" data-bs-target="#v-pills-followed" type="button" role="tab" aria-controls="v-pills-followed" aria-selected="true">
                <i class="fa-solid fa-store me-2"></i>
                Followed Stores
            </button>
        </div>
        <div class="tab-content col-sm-9" id="v-pills-tabContent">
            @include('profile.me')
            @include('profile.addresses')
            @include('profile.ads')
            @include('profile.wallet')
            @include('profile.favorites')
            @include('profile.history')
            @include('profile.followed')
        </div>
    </div>
</div>

@endsection