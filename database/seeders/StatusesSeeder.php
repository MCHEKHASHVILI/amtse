<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ["row_color"=>"#", "name" => "Added", "name_ge" => "დასამუშავებელი"],
            ["row_color"=>"#dae2e8", "name" => "In Progress", "name_ge" => "მუშავდება"],
            ["row_color"=>"#b4cf9d", "name" => "Ready", "name_ge" => "დამუშავებულია"],
            ["row_color"=>"#e3cfba", "name" => "Sold Out", "name_ge" => "გაყიდული" ],
            ["row_color"=>"#", "name" => "Production Started", "name_ge" => "წარმოება დაწყებულია" ],
            ["row_color"=>"#", "name" => "Production Ended", "name_ge" => "წარმოება დასრულებულია" ],
            ["row_color"=>"#", "name" => "Production Out", "name_ge" => "გამოსულია ქარხნიდან" ],
            ["row_color"=>"#", "name" => "Transportation Started", "name_ge" => "ტრანსპორტირება დაწყებულია" ],
            ["row_color"=>"#", "name" => "Delivered in Stock", "name_ge" => "დასაწყობებულია" ],
            ["row_color"=>"#", "name" => "Customer Received", "name_ge" => "დასრულებულია" ],
        ];

        // Loop Through Statuses
        foreach($statuses as $key => $status)
        {
            Status::create($status);
        }
    }
}
