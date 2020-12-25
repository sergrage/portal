<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\CK\Temperature;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    public function index() {
        $temperatures = Temperature::whereDate('created_at', Carbon::today())->get();

        if($temperatures->isEmpty()) {
            for($i=0; $i< 24 ; $i++) {
                $p = new Temperature;
                $p->ges1 = '###';
                $p->ges2 = '###';
                $p->ges3 = '###';
                $p->ges5 = '###';
                $p->ges6 = '###';
                $p->ges7 = '###';
                $p->ges9 = '###';
                $p->ges10 = '###';
                $p->ges14 = '###';
                $p->ges16 = '###';
                $p->tec13 = '###';
                $temperatures->push($p);
            }
        } elseif($temperatures->count() !== 24) {
            $last = intval($temperatures->last()->created_at->format('H'));
            $first = intval($temperatures->first()->created_at->format('H'));

            for($i=$last; $i< 23 ; $i++) {
                $p = new Temperature;
                $p->ges1 = '###';
                $p->ges2 = '###';
                $p->ges3 = '###';
                $p->ges5 = '###';
                $p->ges6 = '###';
                $p->ges7 = '###';
                $p->ges9 = '###';
                $p->ges10 = '###';
                $p->ges14 = '###';
                $p->ges16 = '###';
                $p->tec13 = '###';

                $temperatures->push($p);
            }

            for($i=0; $i < $first ; $i++) {
                $p = new Temperature;
                $p->ges1 = '###';
                $p->ges2 = '###';
                $p->ges3 = '###';
                $p->ges5 = '###';
                $p->ges6 = '###';
                $p->ges7 = '###';
                $p->ges9 = '###';
                $p->ges10 = '###';
                $p->ges14 = '###';
                $p->ges16 = '###';
                $p->tec13 = '###';

                $temperatures->prepend($p);
            }
        }
        $result = [];
        for($i=0;  $i< 24 ; $i++) {
            $result[] = $temperatures[$i];
        }


        return view('app.temperatures.index', compact('result' ));
    }
}
