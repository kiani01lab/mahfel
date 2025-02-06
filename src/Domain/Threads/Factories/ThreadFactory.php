<?php

namespace Domain\Threads\Factories;

use Domain\Threads\ValueObjects\ThreadValueObject;

class ThreadFactory
{
    public function create(array $attributes): ThreadValueObject
    {
        return new ThreadValueObject(
            title: $attributes['title'],
            body: $attributes['body'],
            published: $attributes['published'],
        );
    }
}
