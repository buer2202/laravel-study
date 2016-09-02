<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function votes()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->morphMany('App\Like', 'like');
    }

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtolower($value);
    // }
}
