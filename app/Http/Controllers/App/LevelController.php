<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CK\Water;

class LevelController extends Controller
{
    public function index()
    {
    	return view('app.levels.index');
    }

    public function getWater()
    {
    	$waters = Water::whereDate('created_at',  Carbon::today())->get();
    	$count = $waters->count();

    	if( $count == 0) {
            for($i=0; $i< 24 ; $i++) {
                $w = new Water;
                $w->segozero = '###';
                $w->pl21 = '###';
                $w->pl25 = '###';
                $w->pl27 = '###';
                $w->idleGes1 = '###';
                $w->idleGes2 = '###';
                $w->idleGes5 = '###';
                $w->idleGes6 = '###';
                $w->idleGes7 = '###';
                $w->idleGes9 = '###';
                $w->idleGes10 = '###';
                $w->idleGes16 = '###';
                $w->oldBed = '###';
                $w->ges2Reservoir = '###';
                $waters->push($w);
            }

        } elseif($count !== 24) {
        	for($i=$count; $i< 24 ; $i++) {
                $w = new Water;
                $w->segozero = '###';
                $w->pl21 = '###';
                $w->pl25 = '###';
                $w->pl27 = '###';
                $w->idleGes1 = '###';
                $w->idleGes2 = '###';
                $w->idleGes5 = '###';
                $w->idleGes6 = '###';
                $w->idleGes7 = '###';
                $w->idleGes9 = '###';
                $w->idleGes10 = '###';
                $w->idleGes16 = '###';
                $w->oldBed = '###';
                $w->ges2Reservoir = '###';
                $waters->push($w);
            }
        }

        return $waters;
        
    }
}
