<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\CK\Pbr;
use App\Models\CK\Power;
use Carbon\Carbon;

class GenerationController extends Controller
{
    public function getGeneartion()
	{
 		Artisan::call('command:GetSumGeneration');
		$json = Artisan::output();
		$result = json_decode($json);
		return response()->json($result);
    	// $result = Artisan::call('command:GetSumGeneration');

    	// return $result;

    	// return response()->json(['temperature' => $result[0], 'generation' => $result[1]]);
    	// return response()->json(['temperature' => 5, 'generation' => 6]);

    }

    public function getPbr()
    {
    	$pbrs = Pbr::whereDate('created_at',  Carbon::today())->get();
        $sum = 0;
        $pbrsSum = [];
        foreach ($pbrs as $value ) {
            $sum =  $value['ges1'] + $value['ges2'] + $value['ges3'] + $value['ges5'] + $value['ges6'] + $value['ges7'] + $value['ges9'] + $value['ges10'] + $value['ges14'] + $value['ges16'] + $value['tec13'];
            $pbrsSum [] = round($sum, 1);
            $sum = 0;
        }
    	return response()->json(['result' => $pbrsSum , 'state' => 200]);
    }

    public function getPower()
    {
        $powers = Power::whereDate('created_at',  Carbon::today())->get();
        $sum = 0;
        $powersSum = [];
        foreach ($powers as $value ) {
            $sum =  $value['ges1'] + $value['ges2'] + $value['ges3'] + $value['ges5'] + $value['ges6'] + $value['ges7'] + $value['ges9'] + $value['ges10'] + $value['ges14'] + $value['ges16'] + $value['tec13'];
            $powersSum [] = round($sum, 1);
            $sum = 0;
        }
        return response()->json(['result' => $powersSum, 'state' => 200]);
    }
}