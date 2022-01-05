<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;

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
            'ui_mode' => session('ui_mode', 'light'),
            'notifications' => Notification::where('status', 1)->whereIn('target', [Auth::user()->type ?? 0, 2])->orderBy('updated_at', 'desc')->get(),
        );
        View::share('data', $data);
    }
}
