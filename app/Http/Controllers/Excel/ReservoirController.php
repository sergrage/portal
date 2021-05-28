<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use App\Exports\ReservoirExport;
use Maatwebsite\Excel\Facades\Excel;


class ReservoirController extends Controller
{
   public function export($date = null, $reservoir = null)
    {
        return Excel::download(new ReservoirExport($date, $reservoir), 'reservoir.xlsx');
    }
}
