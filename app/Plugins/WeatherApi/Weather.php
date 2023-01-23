<?php

namespace App\Plugins\WeatherApi;

class Weather
{
    public function __construct(
        public readonly string $temperature,
        public readonly string $feelsLike,
        public readonly string $tempMin,
        public readonly string $tempMax,
        public readonly string $pressure,
        public readonly string $humidity,
        public readonly string $windSpeed,
        public readonly string $windDegree,
    ) {
        //
    }
}
