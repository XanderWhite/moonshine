<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    protected $fillable = [
        'title',
        'announce',
        'content',
        'image',
        'date'
    ];

    public function scopeOrderedNews(Builder $query): Builder
    {
        return $query->orderBy('date', 'desc');
    }

    public function getFormattedDateAttribute(): string
    {
        return  date('d.m.Y', strtotime($this->date));
    }

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
