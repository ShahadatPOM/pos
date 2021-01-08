<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [
        'variantName', 'fkfood_id', 'price', 'status'
    ];

    public function food(){
        return $this->hasOne('App\Food', 'id', 'fkfood_id');
    }
}
