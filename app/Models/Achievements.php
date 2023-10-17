<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievements extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'score',
        'title',
        'logo',
        'icon',
        'info',
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
