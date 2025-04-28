<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'ticker',
        'last_close_price',
        'dividend_yield',
    ];
}
