<?php

namespace Domain\Threads\Actions;

use Domain\Threads\Models\Thread;
use Domain\Threads\ValueObjects\ThreadValueObject;
use Illuminate\Support\Str;

class CreateThreadAction
{
    public static function execute(ThreadValueObject $object): Thread
    {
        return Thread::create(array_merge($object->toArray(), [
            'slug' => Str::slug($object->title),
            'user_id' => auth()->id(),
        ]));
    }
}
