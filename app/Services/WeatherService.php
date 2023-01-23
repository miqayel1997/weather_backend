<?php

namespace App\Services;

use App\Dto\WeatherDto;
use App\Plugins\WeatherApi\Exceptions\PlaceNotFoundException;
use App\Plugins\WeatherApi\Exceptions\UnauthenticatedException;
use App\Plugins\WeatherApi\WeatherApi;

class WeatherService
{
    public function __construct(
        private WeatherApi $weatherApi
    ) {
        //
    }

    public function getWeather(string $query)
    {
        try {
            $weather = $this->weatherApi->getWeather($query);
        } catch(PlaceNotFoundException $e) {
            abort(400, 'Place not found');
        } catch(UnauthenticatedException $e) {
            abort(500);
        }

        return new WeatherDto(
            $weather->temperature,
            $weather->feelsLike,
            $weather->tempMin,
            $weather->tempMax,
            $weather->pressure,
            $weather->humidity,
            $weather->windSpeed,
            $weather->windDegree,
        );
    }
}
