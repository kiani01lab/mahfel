<?php

namespace Domain\Threads\Actions;

use Domain\Shared\Models\User;
use Domain\Threads\Models\Thread;
use Domain\Threads\ValueObjects\ThreadValueObject;

class CreateThreadAction
{
    public static function execute(ThreadValueObject $object, User $user): Thread
    {
        return Thread::create(array_merge(
            $object->toArray(),
            ['user_id' => $user->id],
        ));
    }
}
