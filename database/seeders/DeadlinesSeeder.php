<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DeadlinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Order_Deadline_Types = [
            "REQUEST_HANDLING",
            "MANUFACTURING",
            "TRANSPORTATION",
            "ORDER_HANDLING",
        ];


        $orders = Order::all();
        
        

        // Loop Through Orders
        foreach($orders as $order)
        {
            foreach($Order_Deadline_Types as $type)
            {
                $order->deadlines()->create(["deadline_type" => $type, "deadline" => Carbon::today()]);
            }
            
        }
    }
}
