<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\CK\CKPowerService;
use Illuminate\Http\Request;

class PowerController extends Controller
{
    private $service;

    public function __construct(CKPowerService  $service)
    {
        $this->service = $service;
    }

    public function index(Request $request) {

        return view('app.power.index');
    }

    public function power(Request $request) {

        $date = $request->get('dateTo');

        $result = $this->service->powerData($date);

        return response()->json(['result' => $result, 'date' => $date , 'state' => 200]);
    }

 }
