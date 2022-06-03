<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Topics;
use App\Models\Posts;
use App\Models\User;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'topic' => Topics::factory(),
            'content' => $this->faker->sentence(),
            'create_id' => User::factory(),
            'update_id' => User::factory()
        ];
    }
}
