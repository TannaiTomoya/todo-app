<?php

namespace Database\Factories;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Todo>
 */
class TodoFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startAt = fake()->dateTimeBetween('+1 day', '+1 month');

        return [
            'user_id' => User::factory(),
            'title' => fake()->randomElement(['企画書を書く', '牛乳を買う', 'Laravel を復習する']).' '.fake()->unique()->numberBetween(1, 100000),
            'memo' => '忘れないようにメモしておく。',
            'category' => fake()->randomElement(['仕事', '買い物', '勉強']),
            'start_at' => $startAt,
            'due_at' => (clone $startAt)->modify('+3 days'),
        ];
    }
}
