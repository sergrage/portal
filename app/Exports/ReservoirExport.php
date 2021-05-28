<?php

namespace App\Exports;

use App\Models\CGMS;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Http\Resources\YearResource;


class ReservoirExport implements FromView
{
	private $date;
    private $reservoir;

    public function __construct($date, $reservoir){
        $this->date = $date;
        $this->reservoir = $reservoir;
    }

    public function view(): View
    {

        // dd($this->reservoir);

        $dateForRequest = Carbon::createFromFormat('Y', $this->date, 'Europe/Moscow');

        $reservoirName = "App\Models\Reservoirs\\" . $this->reservoir;


        $reservoir = $reservoirName::whereYear('created_at', $dateForRequest)->get();
        $countOfCollection = $reservoir->count();


        if($countOfCollection != 372) {
            $сountOfEmptyDates = 372 - $countOfCollection;

            for($i=0; $i<$сountOfEmptyDates; $i++) {
               
                $r = new $reservoirName;
                $r->waterLevel = -100;
                $reservoir->push($r);
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
                $arr[] = $reservoir[$r]->waterLevel;
            } else {
                $arr[] = $reservoir[$r]->waterLevel; 
                $res[] = $arr;
                $arr = []; 
            }
                $index++;
        }

        return view('app.partials.reservoirTable', compact('res'));
    }
}
