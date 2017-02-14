<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Notifications\NewBid;
use Illuminate\Http\Request;
use App\Http\Traits\ShowProducts;

class HomeController extends Controller
{
    use ShowProducts;

    /**
     * Show the Landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('photos', 'user')->latest()->take(10)->get();

        $categories = Category::with('products4')->has('products4')->take(5)->get();

        return view('index', compact('products', 'categories'));
    }


    /*Show Contact Form*/
    public function contact()
    {
        return view('contact');
    }

    /*Make Bid On the Product*/
    public function makeBid(Request $request, $slug)
    {
        $this->validate($request, [
            'budget' => 'required|numeric|min:0',
            'message' => 'required'
        ]);

        $product = Product::where('slug', $slug)->first();
        $bid = new Bid($request->all());
        $bid->product_id = $product->id;
        $user = auth()->user();
        $bid->seller()->associate($user);
        $bid->save();

        $user->notify(new NewBid($product->user, $bid, $user));

        return $bid;

    }

    /*Testing Purpose*/
    public function test()
    {
        $product = Product::find(2);
        $pro = $product->replicate();
        return $pro;
    }


    /*Add Someone's Product To your own wishList*/
    public function addProductToMyWishList(Request $request)
    {

        // Find The Product
        $product = Product::find($request->input('id'));

        // create copy of the product
        $productCopy = $product->replicate();
        $productCopy->save();

        // Add tags to replicated Product
        $productCopy->tag($product->tagNames());

        // Add Photos to the Replicated Product
        foreach ($product->photos as $photo) {
            $productCopy->photos()->save($photo->replicate());
        }

        // Attach The Product To the Current User
        $productCopy->user()->associate(auth()->user());

        // Save The Product
        $productCopy->save();

        return $productCopy;

    }
}
