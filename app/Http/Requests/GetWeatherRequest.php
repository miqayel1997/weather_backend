<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetWeatherRequest extends FormRequest
{
    public function rules()
    {
        return [
            'query' => ['required', 'string']
        ];
    }
}
