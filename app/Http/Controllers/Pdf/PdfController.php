<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Services\CK\CKPowerService;
use Illuminate\Http\Request;
use \PDF;

class PdfController extends Controller
{
    private $service;

    public function __construct(CKPowerService  $service)
    {
        $this->service = $service;
    }

    public function power(Request $request){

        $date = $request->get('dateTo');

        switch ($request->path()) {
            case 'power-pdf':
                $result = $this->service->powerData($date);
                $pdFView = 'pdf.power';
                $size = 'a3';
                $orientation = 'landscape';
            case 'q-pdf':
                echo "i равно 1";
            case 'w-pdf':
                echo "i равно 2";
        }


        $pdf = PDF::loadView($pdFView, compact('result'))->setPaper($size, $orientation);
        return $pdf->download('invoice.pdf');


    }
}
