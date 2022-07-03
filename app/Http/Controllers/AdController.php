<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ads.list');
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
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
