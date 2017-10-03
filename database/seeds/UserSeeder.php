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
            'email'    => 'nelson@blackpay.co.ke',
            'password' => bcrypt('root'),
        ]);

        factory(App\Models\User::class)->create([
            'name'     => 'Winnie Nanjala',
            'email'    => 'nanjala@irenkenya.com',
            'password' => bcrypt('password'),
        ]);
    }
}
