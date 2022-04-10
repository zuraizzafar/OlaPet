<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.home');
    }

    public function notifications() {
        $notifications = Notification::with(['targeted', 'user'])->get();
        $users = User::all();
        return view('admin.notifications', compact('notifications', 'users'));
    }
}
