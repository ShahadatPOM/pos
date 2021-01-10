<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'fkorderId', 'itemName', 'itemPrice', 'quantity', 'total', 'status'
    ];
}
