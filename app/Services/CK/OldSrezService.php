<?php

namespace App\Services\CK;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class OldSrezService {

    public function getParameters($model, $ids, $goodStatus, $typeOfRequest) {
        $stationArray = [
            1 => $ids[0],
            2 => $ids[1],
            3 => $ids[2],
            5 => $ids[3],
            6 => $ids[4],
            7 => $ids[5],
            9 => $ids[6],
            10 => $ids[7],
            14 => $ids[8],
            16 => $ids[9],
            13 => $ids[10]
        ];

        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');

        $sql = "
            EXEC OIK.dbo.SrezLT
            @Cat = ?,
            @Ids = ?,
            @Time = '" . $now . "'
        ";

        $params = array($typeOfRequest, $this->gesIdString($stationArray));

        try {
            $conn = DB::connection('sqlsrv');
            $dataFromDB = $conn->select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $model::create([
                'ges1' => -100,
                'ges2' => -100,
                'ges3' => -100,
                'ges5' => -100,
                'ges6' => -100,
                'ges7' => -100,
                'ges9' => -100,
                'ges10' => -100,
                'ges14' => -100,
                'ges16' => -100,
                'tec13' => -100,
                'status' => false
            ]);
            return 0;
        }

        $idValueArray = $this->keyValueArray($dataFromDB, $stationArray, $goodStatus);

        $model::create([
            'ges1' => $idValueArray[1],
            'ges2' => $idValueArray[2],
            'ges3' => $idValueArray[3],
            'ges5' => $idValueArray[5],
            'ges6' => $idValueArray[6],
            'ges7' => $idValueArray[7],
            'ges9' => $idValueArray[9],
            'ges10' => $idValueArray[10],
            'ges14' => $idValueArray[14],
            'ges16' => $idValueArray[16],
            'tec13' => $idValueArray[13],
            'status' =>  $this->getStatus($dataFromDB, $goodStatus)
        ]);
        return 1;
    }

    public function getStatus($dataFromDB, $badStatus)
    {
        $statuses = Arr::pluck($dataFromDB, 'QC');
        foreach($statuses as $s) {
            if($s !== $badStatus) {
                return false;
            }
        }
        return true;
    }

    public function keyValueArray($powerData, $powerArray, $goodStatus)
    {
        $keyValue = [];
        foreach ($powerData as $t) {
            $id = $t->id; // 1880
            $key = array_search($id, $powerArray);  // 1
            $keyValue[$key] = $t->QC == $goodStatus ? $t->value : -100;
        }
        return $keyValue;
    }

    public function gesIdString($gesIdArray)
    {
        $gesIdString = '';
        foreach ($gesIdArray as $a) {
            $gesIdString = $gesIdString . $a . ',';
        }
        return rtrim($gesIdString, ", ");
    }

}
