<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_ads = Ad::with(['banner', 'images', 'user'])->where('sold_to', NULL)->skip(0)->take(12)->orderBy('created_at', 'DESC')->get();
        // return $all_ads;
        return view('home', compact('all_ads'));
    }

    public function seller()
    {
        return view('seller.home');
    }

    public function profile()
    {
        return view('profile.profile');
    }

    public function profile_update(Request $request)
    {
        // return $request;
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasfile('profile')) {
            $file = $request->file('profile');
            $originalFileName = time() . $file->getClientOriginalName();
            $multi_filePath = 'images' . '/' . $originalFileName;
            Storage::disk('s3')->put($multi_filePath, file_get_contents($file));
            $image = Media::create([
                'name' => $originalFileName,
                'user_id' => Auth::id(),
                'url' => $multi_filePath,
                'alt' => 'Alternate Message',
            ]);
            $user->image = $image->id;
        }
        $user->save();
        return redirect()->route('profile');
    }
}
