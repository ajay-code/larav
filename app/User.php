<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();
        User::created(function ($user) {

        });
    }

    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

    public function hasSocialLinked($service)
    {
        return (bool) $this->social->where('service', $service)->count();
    }

    public function getAvatar(){
        if($this->profile_picture){
            return $this->profile_picture;
        }

        return '//www.gravatar.com/avatar/'. md5( $this->email ) . '?s=50&d=mm';

    }

    /*Relationships*/

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }

    public function social()
    {
        return $this->hasMany(\App\UserSocial::class);
    }

    public function activationToken(){
        return $this->hasOne(ActivationToken::class);
    }


}
