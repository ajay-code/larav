<?php

namespace App\Http\Controllers;

use App\Http\Utilities\Helper;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the Landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('photos', 'user')->orderBy('created_at', 'desc')->take(10)->get();

        $categories = Category::with('products4')->has('products4')->take(5)->get();

        return view('index', compact('products', 'categories'));
    }

    /*Show Products List*/
    public function showProducts(){

        $products = Product::with('photos', 'user')->orderBy('created_at', 'desc')->paginate(12);

        return view('products', compact('products'));
    }


    /*Show Products By Category*/
    public function categoryProducts($categorySlug){
        $category = Category::where('slug', $categorySlug)->first();

        $products = $category->products()->latestFirst()->paginate(12);

        return view('productsby.category', compact('category', 'products'));
    }

    /*Show Products By Subcategory*/
    public function subcategoryProducts($subcategorySlug){
        $subcategory = Subcategory::where('slug', $subcategorySlug)->first();

        $products = Product::where('subcategory_id', $subcategory->id)->with('photos', 'user')->latestFirst()->paginate(12);

        return view('productsby.subcategory', compact('products', 'subcategory'));
    }

    /*Show Products By Tag*/
    public function tagProducts($tag){

        $products = Product::withAnyTag([$tag])->with('photos')->latestFirst()->paginate(12);

        return view('productsby.tag', compact('products', 'tag'));
    }

    /*Show Single Product Detail*/
    public function show($slug){

        $product = Product::where('slug', $slug)->with('user', 'subcategory', 'photos')->first();

        return view('product', compact('product'));
    }

    /*Add Someone's Product To your own wishlist*/
    public function addProduct(Request $request){

        $product = Product::find($request->input('id'));

        $productCopy = $product->replicate();

        $productCopy->save();

        foreach ($product->photos as $photo){
            $productCopy->photos()->save($photo->replicate());
        }

        $productCopy->user()->associate(auth()->user());

        $productCopy->save();

        return $productCopy;

    }


    public function contact(){

        return view('contact');
    }


    /*Testing Purpose*/
    public function test(){
        $product = Product::find(2);
        $pro = $product->replicate();
        return $pro;
    }

}
