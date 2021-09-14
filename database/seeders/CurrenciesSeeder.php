<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            "USD",
            "EUR",
            "GBP",
            "RUB",
            "GEL",
        ];
        foreach($currencies as $currency){
            Currency::create(["code" => $currency]);
        }
    }
}
