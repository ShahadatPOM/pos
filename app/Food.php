<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'foodName', 'fkcategory_id', 'Description', 'food_image', 'status', 'price'
    ];

    public function category(){
        return $this->hasOne('App\Category', 'id', 'fkcategory_id');
    }

}

