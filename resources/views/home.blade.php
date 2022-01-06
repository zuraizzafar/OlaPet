@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-3">
            <a class="text-decoration-none text-dark" href="javascript:void(0)">
                <div class="card">
                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/best-girl-cat-names-1606245046.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h6 class="card-title">Card title</h6>
                            </div>
                            <div class="col-4">
                                <i class="fas fa-rupee-sign"></i> 150
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
    </div>
</div>
@endsection