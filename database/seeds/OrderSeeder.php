<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Ad;
use App\Models\User;

class OrderSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::get()->take(50)->each(function ($ad){
            Order::create([
                'ad_id'        => $ad->id,
                'customer_id'  => User::inRandomOrder()->first()->id,
                'instructions' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
            ]);
        });
    }
}
