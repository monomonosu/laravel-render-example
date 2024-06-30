<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_name' => fake()->name(),
            'title' => fake()->realText(50),
            'platform' => fake()->randomElement(['1', '2', '3', '4']),
            'url' => fake()->url(300),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'passion_level' => fake()->randomElement(['1', '2', '3']),
            'content' => fake()->realText(1000),
        ];
    }
}
