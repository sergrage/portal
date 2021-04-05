<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\CK\Pbr;
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
    	return $pbrs;

    }
}
