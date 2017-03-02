<?php

namespace App\Http\Traits;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;

trait ShowProducts
{
    /*Show Products List*/
    public function showProducts()
    {

        $products = Product::with('photos', 'user')->active()->latest()->paginate(12);

        return view('products', compact('products'));
    }


    /*Show Products By Category*/
    public function categoryProducts($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();

        $products = $category->products()->active()->latest()->paginate(12);

        return view('productsby.category', compact('category', 'products'));
    }

    /*Show Products By Subcategory*/
    public function subcategoryProducts($subcategorySlug)
    {
        $subcategory = Subcategory::where('slug', $subcategorySlug)->first();

        $products = Product::where('subcategory_id', $subcategory->id)->active()->with('photos', 'user')->latest()->paginate(12);

        return view('productsby.subcategory', compact('products', 'subcategory'));
    }

    /*Show Products By Tag*/
    public function tagProducts($tag)
    {

        $products = Product::withAnyTag([$tag])->active()->with('photos')->latest()->paginate(12);

        return view('productsby.tag', compact('products', 'tag'));
    }

    /*Show Single Product Detail*/
    public function show($slug)
    {

        $product = Product::where('slug', $slug)->active()->with('user', 'subcategory', 'photos')->first();

        return view('product', compact('product'));
    }

}