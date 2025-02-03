<?php

namespace Domain\Threads\Models;

use Domain\Replies\Models\Reply;
use Domain\Shared\Models\User;
use Domain\Threads\Models\Builders\ThreadBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    /** @use HasFactory<\Database\Factories\ThreadFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(related: Reply::class);
    }

    public function newEloquentBuilder($query): ThreadBuilder
    {
        return new ThreadBuilder($query);
    }
}
