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
            'name'      => 'Nelson Ameyo',
            'email'     => 'nelson@lipasafe.com',
            'password'  => bcrypt('root'),
            'privilege' => 'ADMIN',
            'telephone' => '0741504000',
            'gender'    => 'M',
            'county'    => collect(config('settings.counties'))->keys()->random()
        ]);

        factory(App\Models\User::class)->create([
            'name'      => 'Service Provider',
            'email'     => 'sp@gmail.com',
            'password'  => bcrypt('root'),
            'privilege' => 'SP',
            'telephone' => '0700123456',
            'gender'    => 'F',
            'county'    => collect(config('settings.counties'))->keys()->random()
        ]);
    }
}
