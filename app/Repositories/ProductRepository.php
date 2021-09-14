<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::orderBy("name", "asc")->get();
    }
}