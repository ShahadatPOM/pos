<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'fkorderId', 'itemPrice', 'quantity', 'total', 'status'
    ];
}
