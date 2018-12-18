<?php

use Illuminate\Database\Seeder;

class ActivityLogSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Order::all()->each(function ($order){
            factory(\App\Models\ActivityLog::class, rand(5, 15))->create([
                'publisher' => 1,
                'order_id'  => $order->id
            ]);
        });
    }
}
