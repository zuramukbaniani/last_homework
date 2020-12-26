<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComments extends Model
{
    protected $fillable = [
        'comment', "comment_id", 'post_id'
    ];
}
