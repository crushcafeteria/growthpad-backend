<?php

use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Forum\Topic::get()->each(function ($topic) {
            factory(\App\Models\Forum\Thread::class, 50)->create([
                'topic_id'  => $topic->id,
                'author_id' => 1
            ]);
        });
    }
}
