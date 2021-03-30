<?php

namespace App\Http\Controllers;

use App\Models\CK\Pbr;
use App\Models\CK\Power;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use App\Models\CK\Temperature;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }

     public function weather(){
        $response = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'units' => 'metric',
            'lat' => 64.42937146965284,
            'lon' => 34.47563982643993,
            'appid' => env('OPEN_WEATHER_API')
        ]);

        dd($response->json());
    }

}
