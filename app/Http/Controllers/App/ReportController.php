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
    	$dateCarbon = Carbon::createFromFormat('Y-m-d', $date, 'Europe/Moscow');
    	$folderName = "//krl.tgc1.local/dfs/AU/SOTSR/READ_ALL/Справка о работе станций ф. Карельский/";
    	$folderName = $folderName . $dateCarbon->year . '/' . $dateCarbon->month . ' ' . $dateCarbon->monthName;

    	if(!is_dir($folderName)) {return $matches;}

    	$filesList = scandir($folderName);

    	$dateFormat = $dateCarbon->format('d_m_y');

	    foreach($filesList as $key => $arrayItem){
	        if( stristr( $arrayItem, $dateFormat ) ) {
	        	Storage::disk('local')->put( '/public' . $folderName . '/' .$arrayItem ,  $arrayItem);
	        	$link = str_replace("/", "\\", '/storage/' .  Str::substr($folderName, 2) . '/' . $arrayItem);
	            $matches[$arrayItem] = $link;
	        }
	    }

    	return $matches;
    }
}
