<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'orderToken', 'orderTotal', 'status'
    ];
    public function orderItem(){
        return $this->hasMany('App\OrderItem', 'fkorderId', 'id');
    }
}
