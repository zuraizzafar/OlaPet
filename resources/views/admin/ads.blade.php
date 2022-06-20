@extends('layouts.admin')

@section('title', 'Ads')

@section('content')

<div class="container-fluid py-2 px-1">
    <div class="row">
        <div class="col-md-12">
            <div class="text-end py-3">
                <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#newAd">
                    <i class="fa-solid fa-plus me-md-2"></i>
                    New Ad
                </button>
            </div>
            <div class="table-responsive bg-white shadow rounded p-3">
                <h5 class="border-bottom pb-2 mb-3">
                    Ads
                    <i class="fa-solid fa-bullhorn ms-md-2"></i>
                </h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ad</th>
                            <th scope="col">User</th>
                            <th scope="col">Target</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ad</th>
                            <th scope="col">User</th>
                            <th scope="col">Target</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($ads as $ad)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $ad->ad }}</td>
                            <td>{{ $ad->user->name }}</td>
                            <td>
                                @if($ad->target==0)
                                Buyers
                                @elseif($ad->target==1)
                                Sellers
                                @else
                                All
                                @endif
                            </td>
                            <td>
                                @if($ad->status==0)
                                Disabled
                                @else
                                Enabled
                                @endif
                            <td>{{ $ad->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="modal fade" id="newAd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newAdLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Ad <i class="fa-solid fa-bullhorn ms-md-2"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create_ads') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Text</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="target" class="form-label">Target</label>
                            <div class="col-6">
                                <select type="text" class="form-control w-100" id="target" name="target">
                                    <option value="2">All users</option>
                                    <option value="0">Buyers</option>
                                    <option value="1">Sellers</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="target_user" class="form-label">Specific User</label>
                            <div class="col-6">
                                <select type="text" class="form-control" id="target_user" name="target_user">
                                    <option value="">No Specific User</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-danger rounded-pill me-1" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-pill">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection