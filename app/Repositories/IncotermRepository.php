<?php

namespace App\Repositories;

use App\Models\Incoterm;

class IncotermRepository
{
    public function all()
    {
        return Incoterm::orderBy("code", "asc")
            ->get();
    }
}