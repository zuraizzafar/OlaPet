<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/change-mode', function() {
    $ui_mode = session('ui_mode', 'light');
    if($ui_mode == "light") {
        session(['ui_mode' => 'dark']);
    }
    else {
        session(['ui_mode' => 'light']);
    }
    return redirect()->back();
})->name('ui_mode');

Route::post('/get-notifications', [NotificationController::class, 'index'])->name('get_notifications')->middleware('auth');;
Route::post('/update-notification-readat', [NotificationController::class, 'notification_read_at'])->name('notification_read_at')->middleware('auth');;

Route::get('/admin', [HomeController::class, 'admin'])->name('admin_dashboard');

Route::get('/seller', [HomeController::class, 'seller'])->name('seller_dashboard');