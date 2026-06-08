<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'location_name' => 'Gedung A',
                'max_motorcycle' => 3,
                'max_car' => 0,
                'max_other' => 0,
            ],
            [
                'location_name' => 'Gedung B',
                'max_motorcycle' => 3,
                'max_car' => 3,
                'max_other' => 3,
            ],
            [
                'location_name' => 'Gedung C',
                'max_motorcycle' => 3,
                'max_car' => 5,
                'max_other' => 2,
            ],
        ];

        foreach ($locations as $location) {
            Location::create([
                'location_name' => $location['location_name'],
                'max_motorcycle' => $location['max_motorcycle'],
                'max_car' => $location['max_car'],
                'max_other' => $location['max_other'],
            ]);
        }
    }
}
