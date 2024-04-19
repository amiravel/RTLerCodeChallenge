<?php

namespace App\Providers;

use App\Adapters\Contracts\TransactionSummaryAdapterInterface;
use App\Adapters\TransactionSummaryAdapter;
use Illuminate\Support\ServiceProvider;

class AdapterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionSummaryAdapterInterface::class, TransactionSummaryAdapter::class);
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
