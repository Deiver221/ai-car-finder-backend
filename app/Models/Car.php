<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    
    protected $casts = [
        'features' => 'array',
];
    protected $fillable = [
        'brand',
        'model',
        'price_per_day',
        'seats',
        'features',
        'image',
    ];
}
