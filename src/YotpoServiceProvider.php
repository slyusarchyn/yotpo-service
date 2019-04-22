<?php

namespace Slyusarchyn\YotpoServiceProvider;

use Illuminate\Support\ServiceProvider;
use Slyusarchyn\App\Services\YotpoService\Contracts\YotpoContract;
use Slyusarchyn\App\Services\YotpoService\YotpoService;

/**
 * Class YotpoServiceProvider
 * @package Slyusarchyn\YotpoServiceProvider
 */
class YotpoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/yotpo.php' => config_path('yotpo.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            YotpoContract::class,
            YotpoService::class
        );
    }
}