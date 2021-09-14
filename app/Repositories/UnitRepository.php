<?php

namespace App\Repositories;

use App\Models\Unit;

class UnitRepository
{
    public function all()
    {
        return Unit::orderBy("name", "asc")
            ->get();
    }
}