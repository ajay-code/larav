<?php

namespace App\Http\Controllers\User;

use App\User;
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
        $user = User::find(2);

        return view('user.notifications', compact('user'));
    }
}
