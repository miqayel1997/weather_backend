<?php

namespace App\Plugins\WeatherApi\Impl;

use App\Plugins\WeatherApi\Exceptions\PlaceNotFoundException;
use App\Plugins\WeatherApi\Exceptions\UnauthenticatedException;
use App\Plugins\WeatherApi\Weather;
use App\Plugins\WeatherApi\WeatherApi;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OpenWeatherApi implements WeatherApi
{
    public function __construct(
        private Client $client
    ) {
        //
    }

    public function getWeather(string $query): Weather
    {
        $baseUrl = config('services.openweather.base_url');
        $token = config('services.openweather.token');

        try {
            $response = $this->client->get("$baseUrl/weather?APPID=$token&q=$query&units=metric");
        } catch(GuzzleException $e) {
            if ($e->getCode() === 401) {
                throw new UnauthenticatedException('Wrong API token');
            } elseif ($e->getCode() === 404) {
                throw new PlaceNotFoundException('Place not found');
            } else {
                throw $e;
            }
        }

        $weatherData = json_decode($response->getBody()->getContents());

        return new Weather(
            $weatherData->main->temp,
            $weatherData->main->feels_like,
            $weatherData->main->temp_min,
            $weatherData->main->temp_max,
            $weatherData->main->pressure,
            $weatherData->main->humidity,
            $weatherData->wind->speed,
            $weatherData->wind->deg,
        );
    }
}
