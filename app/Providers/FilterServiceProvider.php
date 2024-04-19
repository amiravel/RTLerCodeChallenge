<?php

namespace App\Providers;

use App\Filters\BaseFilter;
use App\Filters\Contracts\BaseFilterInterface;
use App\Filters\Contracts\TransactionFilterInterface;
use App\Filters\TransactionFilter;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseFilterInterface::class, BaseFilter::class);
        $this->app->bind(TransactionFilterInterface::class, TransactionFilter::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
