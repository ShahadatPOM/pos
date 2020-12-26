<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'foodName', 'fkcategory_id', 'component', 'notes', 'Description', 'food_image', 'is_special', 'cooking_time', 'status', 'vat'
    ];

    public function category(){
        return $this->hasOne('App\Category', 'id', 'fkcategory_id');
    }

}

