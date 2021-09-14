<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\ProductRepository;

class ProductsComposer
{
    public $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function compose(View $view)
    {
        $view->with("products", $this->productRepository->all());
    }
}