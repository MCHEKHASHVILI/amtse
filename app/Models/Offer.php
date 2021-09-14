<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Incoterm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "user_id",
        "incoterm_id",
        "currency_id",
        "price",
        "description",
        "city",
        "days",
        "active",
        "active_days",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "active" => "boolean",
        "active_days" => "integer",
        "days" => "integer",
    ];

    public function incoterm()
    {
        return $this->belongsTo(Incoterm::class);
    }


    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // OFFERS OF TYPE procurment
    public function p_offer()
    {
        return self::where("type", "=", "p_offer")->first();
    }

    // OFFERS OF TYPE logistic
    public function l_offer()
    {
        return self::where("type", "=", "l_offer")->first();
    }

    public function format()
    {
        return [
            "id" => $this->id,
            "type" => $this->type,
            "order" => $this->order,
            "description" => $this->description,
            "price" => $this->price,
            "currency" => $this->currency,
            "city" => $this->city,
            "incoterm" => $this->incoterm,
            "days" => $this->days,
            "active" => $this->active,
            "author" => $this->user->name,
            "created_at" => $this->created_at->diffForHumans(),
            "updated_at" => $this->updated_at->diffForHumans(),
        ];
    }
}
