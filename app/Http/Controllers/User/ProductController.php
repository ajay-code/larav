<?php

namespace App\Http\Controllers\User;

use Auth;
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
        $products = auth()->user()->products()->where('order_completed', false)->with('photos', 'tagged.tag', 'subcategory')->orderBy('created_at', 'desc')->get();


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
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        $product->load('user', 'photos');
        // return $product->subcategory;
        return view('user.editwish', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $product->update($request->all());
        $subcategory = $request->input('subcategory');
        $product->subcategory()->associate($subcategory);
        $product->save();
        alert()->success('wish successfully updated');
        return redirect('/');
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

    public function addNewPhoto(Request $request,Product $product){
        $product->photos();
        $photo = Photo::fromFile($request->file('file'))->upload();
        $product->attachPhoto($photo);
        return $photo;
    }

    public function deletePhoto(Photo $photo){
        $this->authorize('delete', $photo->product);
        if($photo->is_primary){
            abort(403, 'You Can Not Delete The Primary Image, Please Change The Primary Image First ');
        }
        $photo->delete();
        return back();
    }

    public function setPrimaryImage(Request $request,Product $product){
        $product->photos->each(function($photo){
           $photo->is_primary = false;
           $photo->save();
        });

        $photo = Photo::find($request->input('id'));
        $photo->is_primary = true;
        $photo->save();

        return back();
    }


    public function test(Product $product)
    {

            return $product->bids[0]->seller->id;
    }


//
}
