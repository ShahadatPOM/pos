<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'foodName', 'fkcategory_id', 'component', 'notes', 'Description', 'food_image', 'is_special', 'cooking_time', 'status', 'vat'
    ];
}
