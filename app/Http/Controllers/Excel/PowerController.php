<?php

namespace App\Http\Controllers\Excel;

use App\Exports\PowerExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class PowerController extends Controller
{
    public function export($date = null)
    {
        return Excel::download(new PowerExport($date), 'power.xlsx');
    }
}
