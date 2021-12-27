<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/change-mode', function() {
    $ui_mode = session('ui_mode');
    if($ui_mode == "light") {
        session(['ui_mode' => 'dark']);
    }
    else {
        session(['ui_mode' => 'light']);
    }
    return redirect()->back();
})->name('ui_mode');
