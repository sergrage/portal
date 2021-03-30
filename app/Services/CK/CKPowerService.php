<?php

namespace App\Services\CK;

use App\Models\CK\Pbr;
use App\Models\CK\Power;
use App\Models\CK\Askue;
use App\Models\CK\Temperature;
use Carbon\Carbon;

class CKPowerService {

    public function powerData($date = null) {

        $dateForRequest = $this->setDate($date);

        $pbrs = Pbr::whereDate('created_at', $dateForRequest)->get();

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

        $powers = Power::whereDate('created_at',$dateForRequest)->get();
        $powers = $this->createTableData(Power::class, $powers);

        $askues = Askue::whereDate('created_at',$dateForRequest)->get();
        $askues = $this->createAscueTableData(Askue::class, $askues);



        $result = [];
        for($i=0;  $i< 24 ; $i++) {
            $result[] = [$pbrs[$i], $powers[$i], $askues[$i]];
        }
        return $result;
    }

    public function createAscueTableData($model, $data) {
        if( $data->count() == 0) {
            for($i=0; $i< 24 ; $i++) {
                $p = new $model;
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

                $data->push($p);
            }

        }
        elseif( $data->count() !== 24) {
            $last = intval($data->last()->created_at->format('H'));
            $first = intval($data->first()->created_at->format('H'));

            for($i=$last; $i< 23 ; $i++) {
                $p = new $model;
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

                $data->push($p);
            }

            for($i=0; $i < $first ; $i++) {
                $p = new $model;
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

                $data->prepend($p);
            }
        }
        return $data;
    }

    public function createTableData($model, $data){
        if( $data->count() == 0) {
            for($i=0; $i< 24 ; $i++) {
                $p = new $model;
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

                $data->push($p);
            }

        }
        elseif( $data->count() !== 24) {
            $last = intval($data->last()->created_at->format('H'));
            $first = intval($data->first()->created_at->format('H'));

            for($i=$last; $i< 23 ; $i++) {
                $p = new $model;
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

                $data->push($p);
            }

            for($i=0; $i < $first ; $i++) {
                $p = new $model;
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

                $data->prepend($p);
            }
        }
        return $data;
    }

    public function temperatureData($date = null){
        $dateForRequest = $this->setDate($date);

        $temperature = Temperature::whereDate('created_at', $dateForRequest)->get();
        $temperature = $this->createTableData(Temperature::class, $temperature);

        $result = [];
        for($i=0;  $i< 24 ; $i++) {
            $result[] = $temperature[$i];
        }
        return $result;
    }

    public function setDate($date) {
        return $date ?
            Carbon::createFromFormat('Y-m-d', $date, 'Europe/Moscow') :
            Carbon::today();
    }
}
