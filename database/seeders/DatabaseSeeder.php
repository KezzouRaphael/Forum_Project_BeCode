<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Topics;
use App\Models\Boards;
use App\Models\Posts;
use App\Models\Forums;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'nickname' => "Raphael Kezzou",
            'email' => "raphael.kezzou@live.fr",
            'signature' => "signature"
        ]);
        Boards::factory(10)->create([
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        $forum = Forums::factory(1000)->create([
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        Topics::factory(1000)->create([
            'forum' => $forum->forum_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);

        Posts::factory(1000)->create([
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);

        $user = User::factory(10)->create([
            'nickname' => "user",
            'email' => "user@user.com"
        ]);
    }
}
