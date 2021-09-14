<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offers = [
            [
                "type" => "p_offer",
                "order_id" => 1,
                "user_id" => 3,
                "price" => 15000,
                "description" => "შესყიდვების სატესტო შეთავაზება",
                "city" => "შანხაი",
                "currency_id" => 1,
                "incoterm_id" => 1,
                "days" => 20,
                "active" => 1,
            ],
            [
                "type" => "l_offer",
                "order_id" => 1,
                "user_id" => 4,
                "price" => 5000,
                "description" => "ტრანსპორტირების სატესტო შეთავაზება",
                "city" => "ფოთი",
                "currency_id" => 1,
                "incoterm_id" => 3,
                "days" => 40,
            ],
            
        ];

        // Get Order
        $order = Order::firstOrFail();
        // Loop Through Offers
        foreach($offers as $offer)
        {
            // Create Offers
            $order->offers()->create($offer);
            
        }
    }
}
