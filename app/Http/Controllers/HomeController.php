<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Notifications\NewBid;
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

        $products = Product::with('photos', 'user')->active()->latest()->take(10)->get();

        $categories = Category::with('products4')->has('products4')->take(5)->get();

        $random = Product::inRandomOrder()->active()->limit(24)->get();

        return view('index', compact('products', 'categories', 'random'));
    }

    /**
     * Show the Landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $products = Product::search($request->input('query'))->paginate(12);
        $products->load('photos', 'user');

        if ($products->count() <= 0 ){
            alert()->error('No Matching Product Found');
        }

        return view('products', compact('products'));
    }


    /*Show Contact Form*/
    public function contact()
    {
        return view('contact');
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
        $productCopy->user()->associate(auth()->user()->id);

        // Save The Product

        $productCopy->save();


        return 1;

    }
}
