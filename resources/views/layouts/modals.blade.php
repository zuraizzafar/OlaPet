<div class="modal fade" id="addAddresses" tabindex="-1" aria-labelledby="addAddressesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="POST" action="">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="addAddressesLabel">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        Add Addresses
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
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
                    </div>
                </div>
                <div class="modal-footer justify-content-around">
                    <a href="javaScript:void(0)" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-2"></i>
                        Close
                    </a>
                    <button type="submit" class="btn btn-primary px-4 rounded-pill">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>