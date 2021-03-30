<?php

namespace App\Exports;

use App\Models\CK\Askue;
use App\Models\CK\Pbr;
use App\Models\CK\Power;
use App\Services\CK\CKPowerService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PowerExport implements FromView
{
    private $date;

    public function __construct($date){
        $this->date = $date;
    }

    public function view(): View
    {
        $dateForPowerRequest =  $this->date ?
            Carbon::createFromFormat('Y-m-d', $this->date, 'Europe/Moscow') :
            Carbon::today();

        $pbrs = Pbr::whereDate('created_at', $dateForPowerRequest)->get();

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

        $powers = Power::whereDate('created_at', $dateForPowerRequest)->get();

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

        $askues = Askue::whereDate('created_at',$dateForPowerRequest)->get();

        if( $askues->count() == 0) {
            for($i=0; $i< 24 ; $i++) {
                $p = new Askue;
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
                $p->mges = '###';

                $askues->push($p);
            }

        }
        elseif( $askues->count() !== 24) {
            $last = intval($askues->last()->created_at->format('H'));
            $first = intval($askues->first()->created_at->format('H'));

            for($i=$last; $i< 23 ; $i++) {
                $p = new Askue;
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
                $p->mges = '###';

                $askues->push($p);
            }

            for($i=0; $i < $first ; $i++) {
                $p = new Askue;
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
                $p->mges = '###';

                $askues->prepend($p);
            }
        }

        $result = [];
        for($i=0;  $i< 24 ; $i++) {
            $result[] = [$pbrs[$i], $powers[$i], $askues[$i]];
        }

        return view('app.partials.powerTable', compact('result') );
    }
}
