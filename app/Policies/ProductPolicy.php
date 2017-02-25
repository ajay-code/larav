<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(User $user, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        if (!Auth::check()) {
            return false;
        }
        return $user->id == $product->user->id;
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        if (!Auth::check()) {
            return false;
        }
        return $user->id == $product->user->id;
    }

    /**
     * Determine whether the user can bid on the product.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function bid(User $user, Product $product)
    {
        if (!Auth::check()) {
            return false;
        }
        return $user->id !== $product->user->id;
    }

    /**
     * Determine whether the user can copy the product to his wishlist.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function copy(User $user, Product $product)
    {
        if (!Auth::check()) {
            return false;
        }

        return $user->id !== $product->user->id;
    }
}
