<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutBlock extends Model
{
    protected $fillable = [
        'title',
        'text',
        'image',
        'button_text',
        'button_link',
        'is_main',
    ];

    protected $casts = [
        'is_main' => 'boolean'
    ];

    public function getIsMainTextAttribute(): string
    {
        return $this->is_main ? 'Да' : 'Нет';
    }
}
