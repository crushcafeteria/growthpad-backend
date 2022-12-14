<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AdSeeder::class,
            OrderSeeder::class,
            ActivityLogSeeder::class,
            PaymentSeeder::class,
            TopicSeeder::class,
            ThreadSeeder::class,
            LikeSeeder::class
        ]);
    }
}
