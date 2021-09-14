<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\UnitsComposer;
use App\Http\View\Composers\OrdersComposer;
use App\Http\View\Composers\ProductsComposer;
use App\Http\View\Composers\CustomersComposer;
use App\Http\View\Composers\IncotermsComposer;
use App\Http\View\Composers\CurrenciesComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Partials
        View::composer("partials.units.*", UnitsComposer::class);
        View::composer("partials.incoterms.*", IncotermsComposer::class);
        View::composer("partials.currencies.*", CurrenciesComposer::class);
        View::composer("partials.products.*", ProductsComposer::class);

        // Orders
        View::composer("orders.partials.table", OrdersComposer::class);
    //    View::composer("orders.index", OrdersComposer::class);

    }
}
