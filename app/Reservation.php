<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'table_no', 'no_of_person', 'name', 'mobile', 'email', 'start_time', 'end_time', 'date', 'status'
    ];
}
