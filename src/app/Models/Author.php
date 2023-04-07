<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    protected $table = 'authors';

    use HasFactory;

    protected $fillable = [
        'user_id',
        'uuid',
        'full_name',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'photo_url',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
