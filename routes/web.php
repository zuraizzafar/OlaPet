<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/change-mode', function () {
    $ui_mode = session('ui_mode', 'light');
    if ($ui_mode == "light") {
        session(['ui_mode' => 'dark']);
    } else {
        session(['ui_mode' => 'light']);
    }
    return redirect()->back();
})->name('ui_mode');

Route::post('/get-notifications', [NotificationController::class, 'index'])->name('get_notifications')->middleware('auth');;
Route::post('/update-notification-readat', [NotificationController::class, 'notification_read_at'])->name('notification_read_at')->middleware('auth');;


Route::get('/seller', [HomeController::class, 'seller'])->name('seller_dashboard');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin_dashboard');
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('admin_notifications');
    Route::post('/notifications', [NotificationController::class, 'store'])->name('create_notifications');
});
