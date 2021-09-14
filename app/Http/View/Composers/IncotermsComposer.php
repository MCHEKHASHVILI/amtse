<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\IncotermRepository;

class IncotermsComposer
{
    public $unitRepository;

    public function __construct(IncotermRepository $incotermRepository)
    {
        $this->incotermRepository = $incotermRepository;
    }

    public function compose(View $view)
    {
        $view->with("incoterms", $this->incotermRepository->all());
    }
}