<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\OrderRepository;

class OrdersComposer
{
    public $currencyRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function compose(View $view)
    {
        $view->with("orders", $this->orderRepository->all());
    }
}