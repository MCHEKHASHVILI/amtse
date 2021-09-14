<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\CurrencyRepository;

class CurrenciesComposer
{
    public $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function compose(View $view)
    {
        $view->with("currencies", $this->currencyRepository->all());
    }
}