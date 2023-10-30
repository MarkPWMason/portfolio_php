<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenWeatherAPIController extends Controller
{
    public function getWeatherAPI(Request $request)
    {
        $lat = $request->get('lat');
        $lon = $request->get('lon');

        $apiKey = env('WEATHER_API_KEY');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?appid={$apiKey}&lat={$lat}&lon={$lon}");
        return $response;
    }
}
