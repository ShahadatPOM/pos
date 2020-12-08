<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categoryName', 'parent_cat_id', 'status', 'cat_image'
    ];
}
