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
            'location'  => $this->kakamega(),
            'lon'       => $this->kakamega()->lon,
            'lat'       => $this->kakamega()->lat,
        ]);

        factory(App\Models\User::class)->create([
            'name'      => 'Service Provider',
            'email'     => 'sp@gmail.com',
            'password'  => bcrypt('root'),
            'privilege' => 'SP',
            'telephone' => '0700123456',
            'gender'    => 'F',
            'location'  => $this->bukura(),
            'lon'       => $this->bukura()->lon,
            'lat'       => $this->bukura()->lat,
        ]);

        # Generate community
        $index     = 50;
        $locations = json_decode(\Illuminate\Support\Facades\Storage::disk('public')->get('test-locations.json'), true);

        while ($index > 0) {
            $location = collect($locations)->random();
            factory(\App\Models\User::class)->create([
                'location' => $location,
                'lon'      => $location['lon'],
                'lat'      => $location['lat'],
            ]);
            $index--;
        }

    }

    function kakamega()
    {
        return json_decode('{
            "place_id": "218550",
            "licence": "Data © OpenStreetMap contributors, ODbL 1.0. https://osm.org/copyright",
            "osm_type": "node",
            "osm_id": "44999588",
            "boundingbox": [
              "0.1233",
              "0.4433",
              "34.59",
              "34.91"
            ],
            "lat": "0.2833",
            "lon": "34.75",
            "display_name": "Kakamega, 50100, Kenya",
            "class": "place",
            "type": "city",
            "importance": 0.48740926484756897,
            "icon": "https://nominatim.openstreetmap.org/images/mapicons/poi_place_city.p.20.png"
        }');
    }

    function bukura()
    {
        return json_decode('{
            "place_id": "57722461",
            "licence": "Data © OpenStreetMap contributors, ODbL 1.0. https://osm.org/copyright",
            "osm_type": "node",
            "osm_id": "4699498766",
            "boundingbox": [
              "0.1809092",
              "0.2609092",
              "34.5740795",
              "34.6540795"
            ],
            "lat": "0.2209092",
            "lon": "34.6140795",
            "display_name": "Bukura, Kakamega, Kenya",
            "class": "place",
            "type": "town",
            "importance": 0.4,
            "icon": "https://nominatim.openstreetmap.org/images/mapicons/poi_place_town.p.20.png"
        }');
    }
}
