<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        "user_id","name","length","width","height","weight", 
    ];

    // Product can have many orders
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    // Get full_name attribute
    public function getFullNameAttribute()
    {
        return $this->name . ' - ' . $this->measure;
    }

    // Get Measure Attribute
    public function getMeasureAttribute()
    {
        return '(L*W*H): ' . $this->length . '*' . $this->width . '*' . $this->height . ' mm - Weight: ' . $this->weight . ' KG';
    }
}
