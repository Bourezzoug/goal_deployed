<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
class ApiFootballServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return new Client([
                'base_uri' => 'https://api-football.com/v3/',
                'headers' => [
                    'x-apisports-host' => 'v3.football.api-sports.io',
                    'x-apisports-key' => 'eed10bfa9b1e56451bc3c54d83715045',
                ],
            ]);
        });
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
