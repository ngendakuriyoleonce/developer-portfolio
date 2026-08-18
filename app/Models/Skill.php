<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_category_id', 'name', 'slug', 'proficiency', 'icon',
        'order_column', 'is_active',
    ];

    protected $casts = [
        'proficiency' => 'integer',
        'is_active' => 'boolean',
    ];

    public function skillCategory(): BelongsTo
    {
        return $this->belongsTo(SkillCategory::class);
    }
}
