<?php

namespace Domain\Threads\Models\Builders;

use Illuminate\Database\Eloquent\Builder;

class ThreadBuilder extends Builder
{
    public function published(): self
    {
        return $this->where(column: 'published', operator: true);
    }

    public function draft(): self
    {
        return $this->where(column:'published', operator:false);
    }
}
