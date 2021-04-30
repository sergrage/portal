<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Services\CK\CKPowerService;
use Illuminate\Http\Request;

use App\Models\Cgms;

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

    public function cgmsJSON()
    {
        $cgms = CGMS::all();



        $result = [];

        // foreach($cgms as $c) {
        //       $result[] = $c->temperature;
        // }

        // dd($result);
     
        for ($i = 0; $i <= 371; $i++) {
            $in = intdiv($i , 12) +31 * ($i - 12 * intdiv($i , 12));
            $result[] =  $in;
        }


        $index = 0;
        $res= [];
        $arr = [];

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




    // dd($res);

       





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


        $leaf = false;
        return response()->json(['result' => $res, 'leaf' => $leaf, 'status' => 200]);
    }
}



