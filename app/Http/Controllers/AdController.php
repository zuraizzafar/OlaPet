<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class AdController extends Controller
{

    public function all(Request $request)
    {
        if($request->price_1<=$request->price_2) {
            $l_price = $request->price_1;
            $h_price = $request->price_2;
        } else {
            $l_price = $request->price_2;
            $h_price = $request->price_1;
        }
        if(!isset($request->price_1)) {
            $l_price = 0;
        }
        if(!isset($request->price_2)) {
            $h_price = 500000000;
        }
        $ads = Ad::with(['banner', 'images', 'user'])->where([
            ['sold_to', NULL],
            ['title', 'like', '%' . $request->s . '%'],
            ['price', '>=', $l_price],
            ['price', '<=', $h_price],
            ['cat_id', 'like', '%' . $request->cat_id . '%'],
        ])->orderBy('created_at', 'DESC')->get();
        return view('ads.search', compact('ads', 'request'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_ads = Ad::with(['banner', 'images', 'sold'])->where('sold_to', NULL)->orderBy('created_at', 'DESC')->get();
        return view('ads.list', compact('all_ads'));
    }

    public function sell(Request $request)
    {
        Ad::where([['id', $request->id], ['user_id', $request->user_id]])->update([
            'sold_to' => $request->sold_to,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('image'))
            $file = $request->file('image');
        $originalFileName = time() . $file->getClientOriginalName();
        $multi_filePath = 'images' . '/' . $originalFileName;
        Storage::disk('s3')->put($multi_filePath, file_get_contents($file));
        $image = Media::create([
            'name' => $originalFileName,
            'user_id' => Auth::id(),
            'url' => $multi_filePath,
            'alt' => 'Alternate Message',
        ]);

        $ad = Ad::create([
            'title' => $request->title,
            'price' => $request->price,
            'user_id' => Auth::id(),
            'short_d' => $request->short_description,
            'long_d' => $request->long_description,
            'image' => $image->id,
            'status' => 1,
            'cat_id' => $request->category,
        ]);

        if ($request->hasfile('images')) {
            $files = $request->file('images');

            foreach ($files as $imgfile) {
                try {
                    $originalFileName = time() . $imgfile->getClientOriginalName();
                    $multi_filePath = 'images' . '/' . $originalFileName;
                    Storage::disk('s3')->put($multi_filePath, file_get_contents($imgfile));
                    Media::create([
                        'name' => $originalFileName,
                        'user_id' => Auth::id(),
                        'url' => $multi_filePath,
                        'alt' => 'Alternate Message',
                        'parent' => $ad->id,
                    ]);
                } catch (Exception $e) {
                }
            }
        }
        Notification::create([
            'notification' => 'Your new Ad ' . $request->title . ' has been posted on Olapet, now everyone can see it.',
            'user_id' => 1,
            'target' => 0,
            'status' => 1,
            'target_user' => Auth::id(),
        ]);
        return redirect()->route('my_ads');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad, $id)
    {
        $ad = Ad::where('id', $id)->with(['banner', 'images', 'user', 'category'])->get()->first();
        // return $ad;
        return view('ads.single', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad, $id)
    {
        $ad = Ad::where('id', $id)->with(['banner', 'images', 'user', 'category'])->get()->first();
        if ($ad->user_id != Auth::id())
            return redirect()->route('my_ads');
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        // return $request;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $originalFileName = time() . $file->getClientOriginalName();
            $multi_filePath = 'images' . '/' . $originalFileName;
            Storage::disk('s3')->put($multi_filePath, file_get_contents($file));
            $image = Media::create([
                'name' => $originalFileName,
                'user_id' => Auth::id(),
                'url' => $multi_filePath,
                'alt' => 'Alternate Message',
            ]);
            $ad = Ad::where('id', $request->id)->update([
                'title' => $request->title,
                'price' => $request->price,
                'user_id' => Auth::id(),
                'short_d' => $request->short_description,
                'long_d' => $request->long_description,
                'image' => $image->id,
                'status' => 1,
                'cat_id' => $request->category,
            ]);
        } else {
            $ad = Ad::where('id', $request->id)->update([
                'title' => $request->title,
                'price' => $request->price,
                'user_id' => Auth::id(),
                'short_d' => $request->short_description,
                'long_d' => $request->long_description,
                'status' => 1,
                'cat_id' => $request->category,
            ]);
        }
        if ($request->hasfile('images')) {
            $files = $request->file('images');

            foreach ($files as $imgfile) {
                try {
                    $originalFileName = time() . $imgfile->getClientOriginalName();
                    $multi_filePath = 'images' . '/' . $originalFileName;
                    Storage::disk('s3')->put($multi_filePath, file_get_contents($imgfile));
                    Media::create([
                        'name' => $originalFileName,
                        'user_id' => Auth::id(),
                        'url' => $multi_filePath,
                        'alt' => 'Alternate Message',
                        'parent' => $ad->id,
                    ]);
                } catch (Exception $e) {
                }
            }
        }
        return redirect()->route('my_ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad, Request $request)
    {
        Ad::where([['id',$request->id], ['user_id', $request->user_id]])->delete();
    }
}
