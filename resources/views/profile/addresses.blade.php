@php
$addresses = App\Models\UserAddress::where('user_id', Auth::id())->get();
@endphp
<div class="tab-pane fade" id="v-pills-addresses" role="tabpanel" aria-labelledby="v-pills-addresses-tab" tabindex="0">
    <h4 class="border-bottom mb-3"> Manage Address </h4>
    <div class="mb-3 text-end">
        <button type="button" class="btn btn-primary px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#addAddresses">
            <i class="fa-solid fa-plus me-2"></i>
            Add Address
        </button>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        @foreach($addresses as $address)
        <div class="accordion-item rounded shadow border-light mb-3">
            <div class="accordion-header d-flex" id="flush-heading{{$address->id}}">
                <button class="accordion-button collapsed p-4 fs-6 px-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$address->id}}" aria-expanded="false" aria-controls="flush-collapse{{$address->id}}">
                    <span>
                        <i class="fa-solid fa-location-dot me-2"></i>
                        {{ $address->title }}
                    </span>
                </button>
            </div>
            <div id="flush-collapse{{$address->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$address->id}}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-white rounded">
                    <form method="POST" action="{{ route('update_address') }}">
                        <div class="form-check form-switch pb-2">
                            <input class="form-check-input me-2" type="checkbox" name="primary" id="primary_address" @if($address->type==1) checked @endif>
                            <label class="form-check-label" for="primary_address">Primary Address</label>
                        </div>
                        @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{ $address->id }}">
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Address Title</label>
                                <input required type="text" class="form-control" value="{{ $address->title }}" id="title" name="title">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input required type="text" class="form-control" value="{{ $address->name }}" id="name" name="name">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="address" class="form-label">Address</label>
                                <input required type="text" class="form-control" value="{{ $address->address }}" id="address" name="address">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="street" class="form-label">Street Address</label>
                                <input required type="text" class="form-control" value="{{ $address->street }}" id="street" name="street">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="postal" class="form-label">Postal Code</label>
                                <input required type="text" class="form-control" value="{{ $address->postal_code }}" id="postal" name="postal">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <select required class="form-control" id="country" name="country">
                                    <option value="">Select Country</option>
                                    @foreach (App\Models\Country::all() as $country)
                                    <option value="{{ $country->id }}" @if($address->country==$country->id ) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State</label>
                                <select required class="form-control" id="state" name="state">
                                    <option value="">Select State</option>
                                    @foreach (App\Models\State::all() as $state)
                                    <option value="{{ $state->id }}" @if($address->state==$state->id ) selected @endif>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="city" class="form-label">City</label>
                                <select required class="form-control" id="city" name="city">
                                    <option value="">Select City</option>
                                    @foreach (App\Models\City::all() as $city)
                                    <option value="{{ $city->id }}" @if($address->city==$city->id ) selected @endif>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input required type="tel" class="form-control" value="{{ $address->phone }}" id="phone" name="phone">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" rows="7" id="notes" name="notes">{{ $address->notes }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12 d-flex justify-content-around">
                                <a href="javaScript:void(0)" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-xmark me-2"></i>
                                    Close
                                </a>
                                <button type="submit" class="btn btn-primary px-4 rounded-pill">
                                    <i class="fa-solid fa-cloud-arrow-up me-2"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>