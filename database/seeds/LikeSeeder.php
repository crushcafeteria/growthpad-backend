<?php

use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Forum\Thread::get()->each(function ($thread) {
            factory(\App\Models\Forum\Like::class, rand(1, 200))->create([
                'target_id' => $thread->id,
                'type'      => 'THREAD',
                'author_id' => 1
            ]);
        });
    }
}
