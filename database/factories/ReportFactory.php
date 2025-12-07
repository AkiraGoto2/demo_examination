<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        
        return [
            'number' => $this->faker->numerify('aaa-###'),
            'description' => $this->faker->paragraph,
            'created_at' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'status_id' => $this->faker->numberBetween(1, 3),
            'user_id' => $this->faker->randomElement($userIds)
        ];
    }
}
