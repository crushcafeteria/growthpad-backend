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
            'county'    => 'KAKAMEGA',
            'telephone' => '0741504000',
            'gender'    => 'M'
        ]);

        factory(App\Models\User::class)->create([
            'name'      => 'Service Provider',
            'email'     => 'sp@gmail.com',
            'password'  => bcrypt('root'),
            'privilege' => 'SP',
            'county'    => 'NAIROBI',
            'telephone' => '0700123456',
            'gender'    => 'F'
        ]);
    }
}
