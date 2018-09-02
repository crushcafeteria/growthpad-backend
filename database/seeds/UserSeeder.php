<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name'     => 'Nelson Ameyo',
            'email'    => 'nelson@lipasafe.com',
            'password' => bcrypt('root'),
        ]);

        factory(App\Models\User::class)->create([
            'name'     => 'Winnie Ndunge',
            'email'    => 'winniekimani@gmail.com',
            'password' => bcrypt('root'),
        ]);
    }
}
