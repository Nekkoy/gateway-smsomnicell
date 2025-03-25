<?php

namespace Nekkoy\GatewaySmsomnicell;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class SmsomnicellServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Nekkoy\GatewaySmsomnicell\Services\GatewayService::class, function ($app) {
            return new \Nekkoy\GatewaySmsomnicell\Services\GatewayService();
        });

        $this->app->singleton('gateway-smsomnicell', function ($app) {
            return new \Nekkoy\GatewaySmsomnicell\Services\GatewaySmsomnicellService();
        });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('gateway-smsomnicell.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'gateway-smsomnicell');
    }
}
