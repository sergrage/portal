<?php

namespace App\Http\Controllers\Excel;

use App\Exports\CgmsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;



class CgmsController extends Controller
{
    public function export($date = null)
    {
        return Excel::download(new CgmsExport($date), 'invoices.xlsx');
    }
}
