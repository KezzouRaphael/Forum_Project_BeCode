<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Forums;

class TopicsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence(),
            'forum' => Forums::factory(),
            'create_id' => User::factory(),
            'update_id' => User::factory()
        ];
    }
}
