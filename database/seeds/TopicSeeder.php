<?php

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Forum\Topic::class, 50)->create([
           'author_id' => 1
        ]);
    }
}
