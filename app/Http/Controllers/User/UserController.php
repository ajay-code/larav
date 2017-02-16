<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Models\Notification;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAddWishPage()
    {
        return view('addwish');
    }

    public function showWishListPage()
    {
        return view('wishlist');
    }

    public function showNotifications()
    {
        $user = auth()->user();
        return view('user.notifications', compact('user'));
    }

    public function showSingleNotification($notification)
    {
        $user = auth()->user();
        $notification = $user->notifications()->where('id', $notification)->first();
        // return $notification;
        return view('user.shownotification', compact('notification'));
    }
}
