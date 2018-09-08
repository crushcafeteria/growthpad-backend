<?php

use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{

    public function run()
    {
        factory(\App\Models\Ad::class, 100)->create();
    }
}
