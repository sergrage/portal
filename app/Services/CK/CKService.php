<?php

namespace App\Services\CK;

use App\Models\CK\Power;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CKService {

    public function power() {
        $ges1Id = '49';
        $ges2Id = '61';
        $ges3Id = '79';
        $ges5Id = '123';
        $ges6Id = '141';
        $ges7Id = '153';
        $ges9Id = '31';
        $ges10Id = '171';
        $ges14Id = '189';
        $ges16Id = '213';
        $tec13Id = '7';

        $powerArray = [
            1 => $ges1Id,
            2 => $ges2Id,
            3 => $ges3Id,
            5 => $ges5Id,
            6 => $ges6Id,
            7 => $ges7Id,
            9 => $ges9Id,
            10 => $ges10Id,
            14 => $ges14Id,
            16 => $ges16Id,
            13 => $tec13Id
        ];


        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');

        $sql = "
            EXEC OIK.dbo.SrezLT
            @Cat = ?,
            @Ids = ?,
            @Time = '" . $now . "'
        ";

        $params = array("Л", $this->gesIdString($powerArray));

        try {
            $conn = DB::connection('sqlsrv');
            $powers = $conn->select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            Power::create([
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

        $idValueArray = $this->keyValueArray($powers, $powerArray);

        Power::create([
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
            'status' =>  $this->getStatus($powers)
        ]);
        return 1;
    }

    public function getStatus($powerData)
    {
        $statuses = Arr::pluck($powerData, 'QC');
        foreach($statuses as $s) {
            if($s !== "67108864") {
                return false;
            }
        }
        return true;
    }

    public function keyValueArray($powerData, $powerArray)
    {
        $keyValue = [];
        foreach ($powerData as $t) {
            $id = $t->id; // 1880
            $key = array_search($id, $powerArray);  // 1
            $keyValue[$key] = $t->QC == '67108864' ? $t->value : -100;
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
