<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'title',
        'description', 
        'rating',
        'image',
        'maps_link'
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}
