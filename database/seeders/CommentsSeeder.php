<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = [
            "body" => "სატესტო კომენტარი დიდი კომენტარი მაინტერესებს როგორ გამოჩნდება",
            "user_id" => 1,
        ];
        
        $order = Order::first();
        $order->comments()->create($comment);
        $order->comments()->create($comment);
        $order->comments()->create($comment);
        $order->comments()->create($comment);
        $order->comments()->create($comment);
        $order->comments()->create($comment);
        $order->comments()->create($comment);
    }
}
