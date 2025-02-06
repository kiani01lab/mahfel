<?php

namespace Domain\Threads\ValueObjects;

class ThreadValueObject
{
    public function __construct(
        public string $title,
        public string $body,
        public null|bool $published = false,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'published' => $this->published,
        ];
    }
}
