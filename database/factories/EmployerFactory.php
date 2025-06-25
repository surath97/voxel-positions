<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $r = rand(0,100000);

        return [
            'name' => fake()->name,
            'logo' => "http://picsum.photos/seed/". $r ."/90",
            'user_id' => User::factory()
        ];
    }
}
