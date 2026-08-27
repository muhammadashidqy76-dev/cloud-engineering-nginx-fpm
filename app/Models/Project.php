<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'complexity_order',
        'problem_statement',
        'architecture_decision_summary',
        'impact_metric',
        'preview_image_path',
        'status',
    ];

    protected $casts = [
        'complexity_order' => 'integer',
    ];

    public function techStackItems(): BelongsToMany
    {
        return $this->belongsToMany(TechStackItem::class, 'project_tech_stack_item');
    }

    public function journeyEntries(): HasMany
    {
        return $this->hasMany(JourneyEntry::class, 'applied_project_id');
    }

    public function learningLogEntries(): HasMany
    {
        return $this->hasMany(LearningLogEntry::class, 'related_project_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeOrderedByComplexity(Builder $query): Builder
    {
        return $query->orderBy('complexity_order');
    }
}