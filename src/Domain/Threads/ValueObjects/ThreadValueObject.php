<?php

namespace Domain\Threads\ValueObjects;

class ThreadValueObject
{
    public function __construct(
        public string $title,
        public string $body,
        public int $user_id,
        public null|bool $published = false,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => $this->user_id,
            'published' => $this->published,
        ];
    }
}
