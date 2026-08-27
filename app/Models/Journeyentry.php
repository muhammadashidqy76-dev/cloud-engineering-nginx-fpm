<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class JourneyEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'source',
        'learned',
        'applied_project_id',
        'result',
        'completed_at',
        'display_order',
        'status',
    ];

    protected $casts = [
        'completed_at' => 'date',
        'display_order' => 'integer',
    ];

    public function appliedProject(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'applied_project_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeChronological(Builder $query): Builder
    {
        return $query->orderBy('display_order');
    }
}