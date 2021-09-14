<?php

namespace Database\Seeders;

use App\Models\Incoterm;
use Illuminate\Database\Seeder;

class IncotermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incoterms = [
            "EXW",
            "FCA",
            "FAS",
            "FOB",
            "CFR",
            "CIF",
            "CPT",
            "CIP",
            "DAF",
            "DAT",
            "DAP",
            "DES",
            "DEQ",
            "DDU",
            "DDP",
        ];
        foreach($incoterms as $incoterm){
            Incoterm::create(["code" => $incoterm]);
        }
        
    }
}
