<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Boards;
use App\Models\User;

class ForumsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'board_id' => Boards::factory(),
            'create_id' => User::factory(),
            'update_id' => User::factory()
        ];
    }
}
