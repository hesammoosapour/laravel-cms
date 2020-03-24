<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;


class Post extends Model

{
    use Sluggable;
    use SluggableScopeHelpers;


    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => true,

            ]
        ];
    }

    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body',
        'user_id',
        'is_admin',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }


    public function category()
    {
        return $this->belongsTo('App\Category');
    }



    public function comments(){

        return $this->hasMany('App\Comment');
    }

    public static function scopeIdOldest($query)
    {
//        Query Scope
        return $query->orderBy('id', 'asc')->get();
//        return $query->latest()->get();
    }
    public static function scopeIdLatest($query , $num)
    {
//        Query Scope
        return $query->orderBy('id', 'desc');

//        return $query->latest()->get();
    }

    public function photoPlaceholder()
    {
        return "http://placehold.it/700x200";
    }
}
