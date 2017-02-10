<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function addSubcategory($subcategory)
    {
        $this->subcategories()->save($subcategory);
    }

    public function scopeLatestFirst($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function scopeLatestLast($query)
    {
        $query->orderBy('created_at', 'asc');
    }


    /*RelationShips*/
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    public function products4()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
