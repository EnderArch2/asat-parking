<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleType;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'jenis' => 'motorcycle',
                'perjam_pertama' => 2000,
                'perjam_berikutnya' => 1000,
                'max_perhari' => 10000,
            ],
            [
                'jenis' => 'car',
                'perjam_pertama' => 3000,
                'perjam_berikutnya' => 2000,
                'max_perhari' => 15000,
            ],
            [
                'jenis' => 'other',
                'perjam_pertama' => 5000,
                'perjam_berikutnya' => 3000,
                'max_perhari' => 30000,
            ],
        ];

        foreach($types as $type) {
            VehicleType::create([
                'jenis' => $type['jenis'],
                'perjam_pertama' => $type['perjam_pertama'],
                'perjam_berikutnya' => $type['perjam_berikutnya'],
                'max_perhari' => $type['max_perhari'],
            ]);
        }
    }
}
