<?php

namespace App\Http\Controllers\Admin;

use App\User;
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
     * Deactivate the user
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function deactivate(User $user)
    {
        $user->isActive = false;
        $user->products->each(function($product){
            $product->deactivated = true;
            $product->save();
        });
        $user->save();
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
        $user->isActive = true;
        $user->products->each(function($product){
            $product->deactivated = false;
            $product->save();
        });
        $user->save();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
