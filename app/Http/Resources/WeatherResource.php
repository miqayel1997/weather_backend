<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request): array
    {
        return [
            'temperature' => $this->temperature,
            'feelsLike' => $this->feelsLike,
            'tempMin' => $this->tempMin,
            'tempMax' => $this->tempMax,
            'pressure' => $this->pressure,
            'humidity' => $this->humidity,
            'windSpeed' => $this->windSpeed,
            'windDegree' => $this->windDegree,
        ];
    }
}
