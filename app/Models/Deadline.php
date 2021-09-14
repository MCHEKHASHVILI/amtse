<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deadline extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [

    ];

    public function deadlinable()
    {
        return $this->morphTo();
    }

    public function format()
    {
        return [
            "id" => $this->id,
            "deadline" => $this->deadline,
            "deadline_type" => $this->deadline_type,
            "left_days" => Carbon::parse($this->deadline)->diffInDays(Carbon::now()), // Days Left
        ];
    }

}
