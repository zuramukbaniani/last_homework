<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'subcategory', 'category_id'
    ];
    public function news(){
        return $this->hasMany('App\Products');
    }
}
