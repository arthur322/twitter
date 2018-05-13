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
        'name', 'email', 'password', 'username', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_user_id', 'follower_user_id')->where('followed_user_id', $this->id);
    }

    public function followeds()
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_user_id', 'followed_user_id')->where('follower_user_id', $this->id);
    }

    public function tweets()
    {
        return $this->hasMany('App\Tweet')->latest();
    }

}
