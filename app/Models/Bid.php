<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = ['budget', 'message'];


    /*RelationShips*/
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class);
    }
}
