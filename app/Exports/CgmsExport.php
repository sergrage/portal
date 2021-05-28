<?php

namespace App\Exports;

use App\Models\CGMS;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Http\Resources\YearResource;


class CgmsExport implements FromView
{
	private $date;

    public function __construct($date){
        $this->date = $date;
    }

    public function view(): View
    {

        $dateForRequest = Carbon::createFromFormat('Y', $this->date, 'Europe/Moscow');

        $cgms = CGMS::whereYear('created_at', $dateForRequest)->get();
        $countOfCgmsCollection = $cgms->count();


        if($countOfCgmsCollection != 372) {
            $сountOfEmptyDates = 372 - $countOfCgmsCollection;

            for($i=0; $i< $сountOfEmptyDates ; $i++) {
               
                $t = new CGMS;
                $t->temperature = -100;
                $t->userName = 'auto';
                $cgms->push($t);
            }

        }

        $result = [];
        $res= [];
        $index = 0;
        $arr = [];
        
    
        for ($i = 0; $i <= 371; $i++) {
            $in = intdiv($i , 12) +31 * ($i - 12 * intdiv($i , 12));
            $result[] =  $in;
        }
      

        foreach($result as $r) {

            if(($index+1) % 12 !== 0) {
                $arr[] = $cgms[$r]->temperature;
            } else {
                $arr[] = $cgms[$r]->temperature; 
                $res[] = $arr;
                $arr = []; 
            }
                $index++;
        }

        return view('app.partials.cgmsTable', compact('res'));
    }
}
