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
        $board = Boards::factory()->create([
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        $forum = Forums::factory()->create([
            'board_id' => $board->board_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        $forum2 = Forums::factory()->create([
            'board_id' => $board->board_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        $forum3 = Forums::factory()->create([
            'board_id' => $board->board_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        Topics::factory(10)->create([
            'forum' => $forum->forum_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        Topics::factory(15)->create([
            'forum' => $forum2->forum_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        Topics::factory(10)->create([
            'forum' => $forum3->forum_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);
        $topic = Topics::factory()->create([
            'forum' => $forum->forum_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);

        Posts::factory(10)->create([
            'topic' => $topic->topic_id,
            'create_id' => $user->id,
            'update_id' => $user->id
        ]);

        $user = User::factory()->create([
            'nickname' => "user",
            'email' => "user@user.com"
        ]);
    }
}
