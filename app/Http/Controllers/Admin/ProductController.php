<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
    	return view('admin.products', compact('products'));
    }

    /**
     * Display a listing of the product according to query.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $products = Product::search($request->input('q'))->paginate(12);
        $products->load('photos', 'user');

        return view('admin.products', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsersProducts(User $user)
    {
        $products = $user->products()->latest()->paginate(12);
    	return view('admin.products', compact('products'));
    }

    /**
     * Deactivate the Current Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Product $product)
    {
        $product->deactivated = true;
        $product->save();
        return back();
    }

    /**
     * Activate the Current Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate(Product $product)
    {
        $product->deactivated = false;
        $product->save();
        return back();
    }

}
