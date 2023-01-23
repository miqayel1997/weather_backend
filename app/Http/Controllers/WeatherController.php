<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetWeatherRequest;
use App\Http\Resources\WeatherResource;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    public function __construct(
        private WeatherService $weatherService
    ) {
        //
    }

    public function weather(GetWeatherRequest $request)
    {
        return new WeatherResource($this->weatherService->getWeather($request->get('query')));
    }
}
