<?php

namespace Domain\Replies\Models;

use Database\Factories\ReplyFactory;
use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory;

    protected $fillable = [
        'thread_id',
        'user_id',
        'body',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function newFactory(): ReplyFactory
    {
        return new ReplyFactory();
    }
}
