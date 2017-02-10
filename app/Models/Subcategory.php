<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Subcategory extends Model
{
    use Sluggable;
    public $timestamps = false;

    protected $fillable = [ 'name', 'category_id' ];

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

/* Relationships */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function scopeLatestFirst($query){
        $query->orderBy('created_at', 'desc');
    }

    public function scopeLatestLast($query){
        $query->orderBy('created_at', 'asc');
    }
}
