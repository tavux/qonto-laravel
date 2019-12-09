<?php

namespace Tavux\Qonto\Laravel;

use Illuminate\Support\ServiceProvider;

/**
 * Class QontoServiceProvider
 * @package Tavux\Qonto\Laravel
 *
 */
class QontoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/qonto.php' => config_path('qonto.php'),
        ], ['config', 'qonto']);

        $this->app->singleton('qonto', function ($app) {
            return new Qonto();
        });

        $this->app->alias('qonto', Qonto::class);

    }
}
