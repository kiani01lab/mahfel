<?php

namespace Domain\Threads\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Database\Factories\ThreadFactory;
use Domain\Replies\Models\Reply;
use Domain\Shared\Models\User;
use Domain\Threads\Models\Builders\ThreadBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    /** @use HasFactory<\Domain\Threads\Factories\ThreadFactory> */
    use HasFactory, Sluggable;

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

    public function author(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(related: Reply::class);
    }

    protected static function newFactory(): ThreadFactory
    {
        return ThreadFactory::new();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function newEloquentBuilder($query): ThreadBuilder
    {
        return new ThreadBuilder($query);
    }
}
