<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\CK\CKPowerService;


class PowerController extends Controller
{
    private $service;

    public function __construct(CKPowerService  $service)
    {
        $this->service = $service;
    }

    public function index() {

        $result = $this->service->powerData();

        return view('app.power.index', compact('result'));
    }
}
