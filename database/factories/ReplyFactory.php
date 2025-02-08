<?php

namespace Database\Factories;

use Domain\Replies\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Replies\Models\Reply>
 */
class ReplyFactory extends Factory
{
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
