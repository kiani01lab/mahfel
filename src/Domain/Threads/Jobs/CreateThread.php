<?php

namespace Domain\Threads\Jobs;

use Domain\Shared\Models\User;
use Domain\Threads\Actions\CreateThreadAction;
use Domain\Threads\ValueObjects\ThreadValueObject;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateThread implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    /**
     * Create a new job instance.
     */
    public function __construct
    (
        public ThreadValueObject $object,
        public User $user,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        CreateThreadAction::execute($this->object, $this->user);
    }
}
