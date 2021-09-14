<?php

namespace App\Repositories;

use App\Models\Currency;

class CurrencyRepository
{
    public function all()
    {
        return Currency::orderBy("code", "asc")
            ->get();
    }
}