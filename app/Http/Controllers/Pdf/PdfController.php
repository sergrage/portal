<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Services\CK\CKPowerService;
use \PDF;

class PdfController extends Controller
{
    private $service;

    public function __construct(CKPowerService  $service)
    {
        $this->service = $service;
    }

    public function power(){

        $result = $this->service->powerData();
        $pdf = PDF::loadView('pdf.power', compact('result'))->setPaper('a4', 'landscape');
        return $pdf->download('invoice.pdf');


    }
}
