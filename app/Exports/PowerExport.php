<?php

namespace App\Exports;

use App\Models\CK\Pbr;
use App\Models\CK\Power;
use App\Services\CK\CKPowerService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PowerExport implements FromView
{

    public function view(): View
    {
          $pbrs = Pbr::whereDate('created_at', Carbon::today())->get();

        if($pbrs->isEmpty()) {
            for($i=0; $i< 24 ; $i++) {
                $p = new Pbr;
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
                $pbrs->push($p);
            }
        }

        if($pbrs->pluck('status')->contains('0'))
        {

        }

        $powers = Power::whereDate('created_at', Carbon::today())->get();

        if( $powers->count() == 0) {
            for($i=0; $i< 24 ; $i++) {
                $p = new Power;
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

                $powers->push($p);
            }

        }
        elseif( $powers->count() !== 24) {
            $last = intval($powers->last()->created_at->format('H'));
            $first = intval($powers->first()->created_at->format('H'));

            for($i=$last; $i< 23 ; $i++) {
                $p = new Power;
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

                $powers->push($p);
            }

            for($i=0; $i < $first ; $i++) {
                $p = new Power;
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

                $powers->prepend($p);
            }
        }
        $result = [];
        for($i=0;  $i< 24 ; $i++) {
            $result[] = [$pbrs[$i], $powers[$i]];
        }

        return view('app.partials.powerTable', compact('result') );
    }
}
