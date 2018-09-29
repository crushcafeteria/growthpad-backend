<?php

use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{

    public function run()
    {
        $index     = 100;
        $locations = json_decode(\Illuminate\Support\Facades\Storage::disk('public')->get('test-locations.json'), true);
        while ($index > 0) {
            $location = collect($locations)->random();
            $category = collect(config('settings.categories'))->keys()->random();

            factory(\App\Models\Ad::class)->create([
                'location' => $location,
                'lon'      => $location['lon'],
                'lat'      => $location['lat'],
                'category' => $category
            ]);

            $index--;
        }
    }
}
