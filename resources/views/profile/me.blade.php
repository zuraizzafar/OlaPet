<div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
    <h4 class="border-bottom mb-3"> Profile </h4>
    <form action="" method="post">
        <div class="row py-4">
            <div class="col-md-6 mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label text-black">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Enter Name...">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-black">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter Email...">
                </div>
                <div class="mb-3">
                    <label class="fw-bold text-black d-block">
                        Profile Type
                    </label>
                    <span>{{ $user_type[Auth::user()->type] }}</span>
                </div>
                <div class="mb-4 justify-content-between d-flex align-items-center">
                    <span>Want to change password?</span>
                    <button type="submit" class="btn btn-sm btn-info rounded-pill px-4">
                        Reset Password
                    </button>
                </div>
                <div class="justify-content-between d-flex">
                    <a type="{{ route('home') }}" class="btn btn-light rounded-pill col-md-5">Cancel</a>
                    <button type="submit" class="btn btn-primary rounded-pill col-md-5">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i>
                        Update
                    </button>
                </div>
            </div>
            <div class="col-md-6 mb-3 text-center">
                @if(Auth::user()->image=='')
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-primary text-light">
                            <strong class="me-auto">OlaPet</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <p class="text-start mb-0">
                                You have not selected a profile yet. Choose a profile so people can see you. 😄
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                <img class="shadow-lg w-50 rounded-circle border-0 mb-4" src="{{ asset('images/icons8-test-account-96.png') }}" alt="">
                <input type="file" class="form-control mb-3 invisible" id="profile" name="profile">
            </div>
        </div>
    </form>
</div>