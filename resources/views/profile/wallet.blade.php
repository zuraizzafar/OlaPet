<div class="tab-pane fade" id="v-pills-wallet" role="tabpanel" aria-labelledby="v-pills-wallet-tab" tabindex="0">
    <h4 class="border-bottom mb-3"> Manage Wallet </h4>
    <div class="row mt-5 border-bottom px-4 pb-5">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6 overflow-hidden rounded-md bg-info text-light shadow mx-auto p-5 position-relative">
            <div class="lottie-bg position-absolute w-100 start-0 top-0">
                <lottie-player src="{{ asset('lottiefiles/banner.json') }}" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
            </div>
            <div class="position-relative py-3">
                <span class="text-center fs-3 d-block">
                    Balance
                </span>
                <span class="fs-4 fw-bold d-block text-center">
                    <i class="fa-solid fa-rupee-sign"></i>
                    25, 250
                </span>
            </div>
        </div>
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-2">
            <div class="overflow-hidden rounded-md bg-warning py-4 mb-2 text-light shadow mx-auto position-relative">
                <div class="lottie-bg position-absolute w-100 start-0 top-0 opacity-50">
                    <lottie-player src="{{ asset('lottiefiles/banner.json') }}" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                </div>
                <div class="position-relative">
                    <span class="text-center fs-5 d-block">
                        Pending
                    </span>
                    <span class="fs-6 fw-bold d-block text-center">
                        <i class="fa-solid fa-rupee-sign"></i>
                        5, 500
                    </span>
                </div>
            </div>
            <div class="overflow-hidden rounded-md bg-success py-4 text-light shadow mx-auto position-relative">
                <div class="lottie-bg position-absolute w-100 start-0 top-0 opacity-50">
                    <lottie-player src="{{ asset('lottiefiles/banner.json') }}" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                </div>
                <div class="position-relative">
                    <span class="text-center fs-5 d-block">
                        Income
                    </span>
                    <span class="fs-6 fw-bold d-block text-center">
                        <i class="fa-solid fa-rupee-sign"></i>
                        7, 500
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-evenly px-md-5 py-5">
        <div class="col-10 col-md-3 mb-4 mb-sm-0">
            <button class="btn w-100 btn-success rounded-pill py-2">
                <i class="fa-solid fa-credit-card me-2"></i>
                Top Up
            </button>
        </div>
        <div class="col-10 col-md-3 mb-4 mb-sm-0">
            <button class="btn w-100 btn-info rounded-pill py-2">
                <i class="fa-solid fa-hand-holding-dollar me-2"></i>
                Withdraw
            </button>
        </div>
        <div class="col-10 col-md-3 mb-4 mb-sm-0">
            <button class="btn w-100 btn-primary rounded-pill py-2">
                <i class="fa-solid fa-money-bill-transfer me-2"></i>
                Send
            </button>
        </div>
        <div class="col-sm-8 mx-auto mt-5">
            <p class="text-muted text-center">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, nam assumenda minus maxime laborum excepturi.
            </p>
        </div>
    </div>
</div>