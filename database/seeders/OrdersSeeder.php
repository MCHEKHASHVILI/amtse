<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Request;

class OrdersSeeder extends Seeder
{
    public $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'user_id' => 1,
                'customer' => "სატესტო დამკვეთი 1",
                'description' => "სატესტო აღწერა 1",
                'product_id' => 1,
                'unit_id' => 1,
                'quantity' =>  1,
            ],
            [
                'user_id' => 1,
                'customer' => "სატესტო დამკვეთი 2",
                'description' => "სატესტო აღწერა 2",
                'product_id' => 1,
                'unit_id' => 1,
                'quantity' =>  1,
            ],
        ];
        foreach($orders as $key => $order){
            $this->orderRepository->seeder_store($order);
        }
    }
}
