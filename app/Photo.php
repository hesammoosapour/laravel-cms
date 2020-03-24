<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    protected $uploads = '/images/';
    protected $fillable = ['path'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getPathAttribute($photo)
    {
        return $this->uploads . $photo;
//        url('/').   >> if we change /images/  to sth else
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }


}
