<?php

namespace App\Plugins\WeatherApi;

use App\Plugins\WeatherApi\Impl\OpenWeatherApi;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind(WeatherApi::class, OpenWeatherApi::class);

        $this->app->bind(Client::class, function () {
            return new Client(['verify' => false]);
        });
    }

    public function boot()
    {
        //
    }
}
