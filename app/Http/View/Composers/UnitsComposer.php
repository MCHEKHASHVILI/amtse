<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Repositories\UnitRepository;

class UnitsComposer
{
    public $unitRepository;

    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function compose(View $view)
    {
        $view->with("units", $this->unitRepository->all());
    }
}