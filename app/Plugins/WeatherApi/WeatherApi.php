<?php

namespace App\Plugins\WeatherApi;

interface WeatherApi
{
    public function getWeather(string $query): Weather;
}
