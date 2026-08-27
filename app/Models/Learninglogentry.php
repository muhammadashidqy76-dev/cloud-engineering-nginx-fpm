<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class LearningLogEntry extends Model
{
    use HasFactory;

    public const TAG_EXPLORING = 'exploring';
    public const TAG_PRODUCTION_READY = 'production_ready';

    protected $fillable = [
        'title',
        'content',
        'tag',
        'related_project_id',
        'published_at',
        'status',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function relatedProject(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'related_project_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeExploring(Builder $query): Builder
    {
        return $query->where('tag', self::TAG_EXPLORING);
    }

    public function scopeProductionReady(Builder $query): Builder
    {
        return $query->where('tag', self::TAG_PRODUCTION_READY);
    }
}