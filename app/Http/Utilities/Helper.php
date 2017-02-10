<?php

namespace App\Http\Utilities;


use App\Models\Category;
use Conner\Tagging\Model\Tag;

class Helper
{
    public $categoryChunk;

    public function categories()
    {
        $categories = Category::with('subcategories')->get();
        $this->categoryChunk = ceil($categories->count() / 4);
        return $categories;
    }

    public function tags()
    {
        $tags = Tag::orderBy('count','desc')->take(10)->get();
        return $tags;
    }

    public function tagsAll()
    {
        $tags = Tag::all();
        return $tags;
    }

}