<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ReportController extends Controller
{
    public function getReport(Request $request)
    {
    	$date = $request->get('dateTo');
    	$matches = [];
    	
    	try {
    		$dateCarbon = Carbon::createFromFormat('Y-m-d', $date, 'Europe/Moscow');
    	} catch (\Throwable $e) {
    		return $mathes;
    	}

        if ( !in_array($dateCarbon->monthName, array('октябрь','ноябрь', 'декабрь'), true )) {
            $month = '0' . $dateCarbon->month;
        }

    	$folderName = "/var/www/html/portal/storage/app/public/winshare/";
    	$folderName = $folderName . $dateCarbon->year . '/' . $month . ' ' . $dateCarbon->monthName;

    	if(!is_dir($folderName)) {return ['Ошибка' => '#'];}
    	$filesList = scandir($folderName);
    	$dateFormat = $dateCarbon->format('d_m_y');

	    foreach($filesList as $key => $arrayItem){
	        if( stristr( $arrayItem, $dateFormat ) ) {
	        	$link = str_replace("/", "\\", '/storage/winshare/' . $dateCarbon->year . '/' . $dateCarbon->month . ' ' . $dateCarbon->monthName . '/' . $arrayItem);
	            $matches[$arrayItem] = $link;
	        }
	    }

    	return $matches;
    }
}
