<?php

namespace App\Repositories;

use App\Models\Deadline;

class DeadlineRepository
{
    public function all()
    {
        return Deadline::orderBy("created_at", "desc")
            ->get()
            ->format();
    }
}