<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'short_description', 'full_description',
        'problem', 'solution', 'features', 'technologies', 'thumbnail',
        'github_url', 'live_demo_url', 'start_date', 'completion_date',
        'is_featured', 'is_published', 'order_column',
    ];

    protected $casts = [
        'features' => 'array',
        'technologies' => 'array',
        'start_date' => 'date',
        'completion_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }
}
