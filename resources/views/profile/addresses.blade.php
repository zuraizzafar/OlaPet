<div class="tab-pane fade" id="v-pills-addresses" role="tabpanel" aria-labelledby="v-pills-addresses-tab" tabindex="0">
    <h4 class="border-bottom mb-3"> Manage Address </h4>
    <div class="mb-3 text-end">
        <button type="button" class="btn btn-primary px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#addAddresses">
            <i class="fa-solid fa-plus me-2"></i>
            Add Address
        </button>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item rounded shadow border-light">
            <div class="accordion-header d-flex" id="flush-headingOne">
                <button class="accordion-button collapsed p-4 fs-6 px-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <span>
                        <i class="fa-solid fa-house me-2"></i>
                        Home Address
                    </span>
                </button>
            </div>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-white rounded">
                    <div class="form-check form-switch pb-2">
                        <input class="form-check-input me-2" type="checkbox" id="primary_address">
                        <label class="form-check-label" for="primary_address">Primary Address</label>
                    </div>
                    <form method="POST" action="">
                        <div class="row">
                            <input type="hidden" name="id">
                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Address Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="street" class="form-label">Street Address</label>
                                <input type="text" class="form-control" id="street" name="street">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="postal" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postal" name="postal">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <select type="text" class="form-control" id="country" name="country">
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State</label>
                                <select type="text" class="form-control" id="state" name="state">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="city" class="form-label">City</label>
                                <select type="text" class="form-control" id="city" name="city">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" rows="7" id="notes" name="notes"></textarea>
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
    </div>
</div>