<?php

namespace Database\Factories;

use Domain\Threads\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Threads\Models\Thread>
 */
class ThreadFactory extends Factory
{
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(5, true);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->randomHtml(),
            'published' => fake()->boolean(),
        ];
    }
}
