<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                "name" => "ცალი",
                "name_short" => "ც",
            ],
            [
                "name" => "კომპლექტი",
                "name_short" => "კომპ.",
            ],
        ];

        // Loop Through
        foreach($units as $key => $unit){
            // Create Units
            $result = Unit::create($unit);
        }
    }
}
