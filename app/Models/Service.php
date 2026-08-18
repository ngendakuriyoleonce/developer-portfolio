<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'icon', 'features', 'is_published', 'order_column'];

    protected $casts = [
        'features' => 'array',
        'is_published' => 'boolean',
    ];
}
