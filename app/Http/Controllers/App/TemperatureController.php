<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\CK\CKPowerService;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    private $service;

    public function __construct(CKPowerService  $service)
    {
        $this->service = $service;
    }

    public function index() {
        return view('app.temperatures.index');
    }

    public function temperature(Request $request){

        $date = $request->get('dateTo');
        $result = $this->service->temperatureData($date);

        return response()->json(['result' => $result, 'date' => $date , 'state' => 200]);
    }
}
