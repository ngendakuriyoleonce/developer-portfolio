<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'issuing_organization', 'issue_date', 'expiry_date',
        'credential_id', 'credential_url', 'image_path', 'is_published',
        'order_column',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
        'is_published' => 'boolean',
    ];
}
