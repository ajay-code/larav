<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = auth()->user()->products()->with('photos', 'tagged.tag', 'subcategory')->orderBy('created_at', 'desc')->get();


        return view('user.wishlist', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('user.addwish', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Product
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'subcategory_id' => $request->input('subcategory'),
            'budget' => $request->input('budget'),
            'user_id' => auth()->user()->id
        ]);

        /*Attaching Tags To The Product*/
        if ($request->input('tags')) {
            $product->tag(explode(',', $request->input('tags')));
        }

        /*Adding Photos To Product*/
        $this->addPhotos($request, $product);


        /*Redirect To WishList Page*/
        return redirect('/wishlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    protected function addPhotos($request, $product)
    {

        /*Attach Primary Image To The Product*/
        $photo = Photo::fromFile($request->file('primaryImage'))->upload();
        $product->attachPrimaryPhoto($photo);

        /*Attach All The Other Images If Exists*/
        if ($request->file('sacendoryImages')) {
            foreach ($request->file('sacendoryImages') as $image) {
                if ($image) {
                    $photo = Photo::fromFile($image)->upload();
                    $product->attachPhoto($photo);
                }
            }
        }
    }


//
}
