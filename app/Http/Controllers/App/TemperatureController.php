<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\CK\CKPowerService;
use Illuminate\Http\Request;

use App\Http\Resources\YearCollection;
use App\Http\Resources\YearResource;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Cgms;
use App\Models\Year;

class TemperatureController extends Controller
{
    private $service;

    public function __construct(CKPowerService  $service)
    {
        $this->service = $service;
    }

    public function index() {
        return view('app.temperatures.index');
    }

    public function temperature(Request $request){

        $date = $request->get('dateTo');
        $result = $this->service->temperatureData($date);

        return response()->json(['result' => $result, 'date' => $date , 'state' => 200]);
    }

    public function water()
    {
        return view('app.temperatures.water');
    }

    public function cgms()
    {
        return view('app.temperatures.cgms');
    }

    public function getCgms(Request $request)
    {
        $cgms = CGMS::orderBy('id', 'desc')->where('temperature', '>', -100)->take(15)->get();
        $cgmsSorted = $cgms->sort()->values()->all();

        foreach($cgmsSorted as $c) {
            $temperatures[] = (int)$c->temperature;
            $dates[] = $c->created_at->format('Y-m-d');
        }
            
        return response()->json(['temperatures' => $temperatures, 'dates' =>  $dates, 'status' => 200]);
    }

    public function cgmsJSON(Request $request)
    {
        // Дата из $request. Сразу текущий год. Потом по селекту. 
        $date = $request->get('dateTo') ? $request->get('dateTo') : Carbon::now()->year;
        // Коллектция температур запереданный год
        $cgms = CGMS::whereYear('created_at', $date)->get();

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
  
        


        // $index = 0;

        // $arr = [];

        // dd($result);

        // foreach($result as $val) {
        //     if( $index == 349 || $index == 361 || $index == 363 || $index == 365 || $index == 366 ||$index == 368 ||$index == 370) {
        //          $arr[] = '';
        //     } elseif ($index == 349) {
        //         $arr[] = $cgms[$val]->temperature;
        //     } else {
        //         $arr[] = $cgms[$val]->temperature;
        //     }
        //     $index++;
        // }
        // dd($arr);
        // $index = 1;
        // $result = [];
        // $a = [];


        // foreach($cgms as $c) {
        //     if($index % 12 !== 0) {
        //         $a[] = $c->temperature;
        //     } else {
        //         $result[] = $a;
        //         $a = []; 
        //           $a[] = $c->temperature; 
        //     }
        //      $index++;
        // }

        // foreach($cgms as $c) {
        //        $result[] = $c->temperature;
         
        // }

        $years = YearResource::collection(Year::all());


        $leaf = false;
        return response()->json(['result' => $res, 'years' => $years, 'leaf' => $leaf, 'status' => 200]);
    }
}



