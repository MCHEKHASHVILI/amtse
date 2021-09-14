<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsSeeder::class,
            IncotermsSeeder::class,
            UnitsSeeder::class,
            CurrenciesSeeder::class,
        //    CustomersSeeder::class,
            ProductsSeeder::class,
            StatusesSeeder::class,
            OrdersSeeder::class,
        //    DeadlinesSeeder::class,
            CommentsSeeder::class,
        //    OffersSeeder::class,
        ]);
    }
}
