<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentReply extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [

        'comment_id',
        'replier_id',
        'body',
        'is_active'


    ];


    public function comment(){

        return $this->belongsTo('App\Comment');

    }




}
