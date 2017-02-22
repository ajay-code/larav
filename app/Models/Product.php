<?php

namespace App\Models;

use App\Models\Bid;
use Conner\Tagging\Taggable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Taggable, Sluggable,Searchable;

    protected $fillable = ['title', 'description', 'budget', 'user_id', 'subcategory_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function attachPhoto($photo)
    {
        $this->photos()->save($photo);
    }

    public function attachPrimaryPhoto($photo)
    {
        $photo->is_primary = true;
        $this->photos()->save($photo);
    }

    public function getPrimaryPhoto()
    {
        return $this->photos->first(function ($value) {
            return $value->is_primary == true;
        });
    }

    public function getSecondaryPhotos()
    {
        return $this->photos->reject(function ($value) {
            return $value->is_primary == true;
        });
    }

    public function scopeLatestFirst($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function scopeLatestLast($query)
    {
        $query->orderBy('created_at', 'asc');
    }

    public function searchableAs()
    {
        return 'products_index';   
    }

    public function madeBid($user = null)
    {

        if($user){
            foreach ($this->bids as $bid) {
                if($user->id == $bid->seller->id){
                    return true;
                }
            }
        }

        return false;
    }


}
