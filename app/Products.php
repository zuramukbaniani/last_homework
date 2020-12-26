<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'title', 'desc', 'photo', 'category_id', 'subcategory_id'
    ];
    public function comments(){
        return $this->hasMany('App\Comment', 'post_id');
    }
    public function reply_comments(){
        return $this->hasMany('App\ReplyComments', 'comment_id');
    }
}