<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // Format The Output in repository
    public function format()
    {
        return [
            "name" => $this->name,
            "short" => $this->name_short
        ];
    }
}
