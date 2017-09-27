<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Vendor::all()->each(function($vendor){

            factory(App\Models\Product::class, 30)->create([
                'vendor_id' => $vendor->id
            ]);

        });
    }
}
