<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('products')->paginate(20);

        return view('admin.user', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Display a listing of the product according to query.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $users = User::search($request->input('query'))->paginate(12);
        return view('admin.user', compact('users'));
    }

    /**
     * Deactivate the user
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function deactivate(User $user)
    {
        $user->update(['isActive' => false]);
        Product::where('user_id', $user->id)
            ->where('deactivated', false)
            ->update(['deactivated' => true]);
        return $user;
    }

    /**
     * Activate the user
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function activate(User $user)
    {
        $user->update(['isActive' => true]);
        Product::where('user_id', $user->id)
            ->where('deactivated', true)
            ->update(['deactivated' => false]);
        return $user;
    }

}
