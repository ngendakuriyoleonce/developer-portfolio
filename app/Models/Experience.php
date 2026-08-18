<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title', 'company', 'location', 'description',
        'responsibilities', 'technologies', 'start_date', 'end_date',
        'is_current', 'is_published', 'order_column',
    ];

    protected $casts = [
        'responsibilities' => 'array',
        'technologies' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'is_published' => 'boolean',
    ];
}
