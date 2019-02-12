<?php

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class, 3)->create([
        	'sender_phone' => '+254706266712'
        ]);
        factory(Payment::class, 200)->create();
    }
}
