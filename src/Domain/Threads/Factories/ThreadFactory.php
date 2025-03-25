<?php

namespace Domain\Threads\Factories;

use Domain\Threads\ValueObjects\ThreadValueObject;

class ThreadFactory
{
    public static function create(array $attributes): ThreadValueObject
    {
        return new ThreadValueObject(
            title: $attributes['data']['attributes']['title'],
            body: $attributes['data']['attributes']['body'],
        );
    }
}
