<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Providers\GoogleDriveServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data = array(
            'nav_off' => array(
                'register',
                'login'
            ),
            'banner_on' => array(
                'home'
            ),
            // 'notifications' => Notification::where('status', 1)->whereIn('target', [Auth::user()->type ?? 0, 2])->where(function ($query) {
            //     $query->where('target_user', null)->orWhere('target_user', Auth::id());
            // })->orderBy('updated_at', 'desc')->get()
        );
        View::share('data', $data);
    }
}
