<?php

namespace App;

use App\Models\Bid;
use App\Models\Product;
use Cmgmyr\Messenger\Traits\Messagable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable, Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'profile_picture', 'country', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'total',
        'completed'
    ];

    public function getTotalAttribute()
    {
        return $this->products->count();
    }

    public function getCompletedAttribute()
    {
        return $this->products()->where('order_completed', true)->get()->count();
    }

    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

    public function hasSocialLinked($service)
    {
        return (bool)$this->social->where('service', $service)->count();
    }

    public function getAvatar()
    {
        if ($this->profile_picture) {
            return $this->profile_picture;
        }

        return '//www.gravatar.com/avatar/' . md5($this->email) . '?s=50&d=mm';

    }

    /*Relationships*/

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function social()
    {
        return $this->hasMany(UserSocial::class);
    }

    public function activationToken()
    {
        return $this->hasOne(ActivationToken::class);
    }


}
