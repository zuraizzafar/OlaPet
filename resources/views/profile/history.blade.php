@php
$ads = App\Models\Ad::where([['user_id', Auth::id()], ['sold_to', '!=', NULL]])->orWhere('sold_to', Auth::id())->with(['banner', 'images', 'user', 'sold'])->orderBy('created_at', 'DESC')->get();
@endphp
<div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab" tabindex="0">
    <h4 class="border-bottom mb-3"> History </h4>
    @foreach($ads as $ad)
    <div class="row pt-4">
        <div class="col-md-6 position-relative btn btn-light my-ads py-0 border-0 single-ad position-relative rounded-md">
            <div class="row">
                <div class="col-4 px-0">
                    <img class="w-100 h-100 object-fit-cover" style="max-height: 162px !important" src="{{ Storage::disk('s3')->temporaryUrl($ad->banner->url, now()->addMinutes(5) ) }}" alt="{{ $ad->banner->alt }}">
                </div>
                <div class="col-8 p-3 text-start">
                    <h4>
                        {{ $ad->title }}
                    </h4>
                    <p class="m-0">
                        {{ strlen($ad->short_d) > 50 ? substr($ad->short_d,0,50)."..." : $ad->short_d }}
                    </p>
                    <span class="text-muted"> <strong> Posted on:</strong> {{ date( "d M Y" , strtotime($ad->updated_at)) }} </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 row text-center justify-content-center align-content-center">
            @if($ad->sold_to != Auth::id())
            <h2 class="col-12">
                <i class="fa-solid fa-arrow-right-long"></i>
            </h2>
            <strong class="col-12">Sold To</strong>
            @else
            <h2 class="col-12">
                <i class="fa-solid fa-arrow-left-long"></i>
            </h2>
            <strong class="col-12">Sold From</strong>
            @endif
        </div>
        <div class="col-md-3">
            @if($ad->sold_to != Auth::id())
            <img class="shadow w-75 rounded-circle border-0" style="height: 132px; width: 132px; object-fit: cover;" src="{{ Storage::disk('s3')->temporaryUrl(App\Models\Media::where('id', $ad->sold->image)->get()->first()->url, now()->addMinutes(5) ) }}" alt="">
            @else
            <img class="shadow w-75 rounded-circle border-0" style="height: 132px; width: 132px; object-fit: cover;" src="{{ Storage::disk('s3')->temporaryUrl(App\Models\Media::where('id', $ad->user->image)->get()->first()->url, now()->addMinutes(5) ) }}" alt="">
            @endif
        </div>
    </div>
    @endforeach
</div>