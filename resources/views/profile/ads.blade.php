@php
$ads = App\Models\Ad::where('user_id', Auth::id())->with(['banner', 'images', 'user', 'sold'])->orderBy('created_at', 'DESC')->get();
@endphp
<div class="tab-pane fade" id="v-pills-ads" role="tabpanel" aria-labelledby="v-pills-ads-tab" tabindex="0">
    <h4 class="border-bottom mb-3"> Manage Ads </h4>
    <div class="row pt-4">
        @foreach($ads as $ad)
        <div class="col-md-8 position-relative mb-5 mx-sm-4 btn btn-light my-ads py-0 border-0 single-ad position-relative rounded-md">
            <div class="row">
                <div class="col-4 px-0">
                    <img class="w-100 h-100 object-fit-cover" style="height: 168px !important;" src="{{ Storage::disk('s3')->temporaryUrl($ad->banner->url, now()->addMinutes(5) ) }}" alt="{{ $ad->banner->alt }}">
                </div>
                <a href="{{ route('single_ad', $ad->id) }}" class="col-8 p-3 text-start text-decoration-none">
                    <h4>{{ $ad->title }}</h4>
                    <span class="text-muted"> <strong> Posted on:</strong> {{ date( "d M Y" , strtotime($ad->updated_at)) }} </span>
                    <p class="m-0">
                        {{ strlen($ad->short_d) > 50 ? substr($ad->short_d,0,50)."..." : $ad->short_d }}
                    </p>
                    <p class="text-start m-0 text-muted">
                        <i class="fa-solid fa-rupee-sign me-2"></i>
                        {{ $ad->price }}
                    </p>
                    @if($ad->sold_to != NULL)
                    <p class="text-start m-0 text-muted" title="Sold To">
                        <i class="fa-solid fa-gavel"></i>
                        {{ $ad->sold->name }}
                    </p>
                    @endif
                </a>
            </div>
            <button class="btn ad-delete-button" data-id="{{ $ad->id }}">
                <i class="fa-solid fa-trash-can"></i>
            </button>
            @if($ad->sold_to == NULL)
            <button class="btn ad-sold-button pe-2 pb-0" data-id="{{ $ad->id }}">
                <i class="fa-solid fa-gavel"></i>
            </button>
            @endif
            <a href="{{ route('edit_ad', $ad->id) }}" class="btn ad-edit-button pe-2 pt-3 pb-0">
                <i class="fa-solid fa-pencil mt-2"></i>
            </a>
        </div>
        @endforeach
    </div>
</div>
<script>
    $('.ad-sold-button').click(function(e) {
        e.preventDefault();

    })
</script>