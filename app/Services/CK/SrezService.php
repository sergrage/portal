<?php

namespace App\Services\CK;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class SrezService {


    // $model = "Power", $Askue ....  имя модели, данные по которой запрашиваем
    // $goodStatus = ['123', '3456] - массив допустимых статусов
    // $typeOfRequest = "Л" - универсальные хранилища 1час

    public function getParameters($model, $ids, $goodStatus, $typeOfRequest) {

// время сейчас "20210127 12:06:24"
        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');
// Подготовленный sql запрос
        $sql = "
            EXEC OIK.dbo.SrezLT
            @Cat = ?,
            @Ids = ?,
            @Time = '" . $now . "'
        ";
//   $params = array('Л', "1400,1409,1417,1435,1441,1447,1453,1462,1470,1477,1524,1532");
        $params = array($typeOfRequest, $this->gesIdString($ids));

        try {
            $conn = DB::connection('sqlsrv');
            $dataFromDB = $conn->select($sql, $params);

        } catch (\Illuminate\Database\QueryException $e) {
            // если возникла ошибка  при подключении к БД, то заполняем пустышкой
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

        $model::create($this->createDataArray($ids,$dataFromDB,$goodStatus));
        return 1;
    }

//    public function getStatus($dataFromDB, $badStatus)
//    {
//        $statuses = Arr::pluck($dataFromDB, 'QC');
//        foreach($statuses as $s) {
//            if($s !== $badStatus) {
//                return false;
//            }
//        }
//        return true;
//    }


    // создает массив ключ => значение
    //array:12 [
    //1 => "18.112320000004971"
    //2 => "17.026999999993681"
    //3 => "50.04052500000801"
    //5 => "31.723499999993699"
    // ...
    //]
//    public function keyValueArray($powerData, $powerArray, $goodStatus)
//    {
//        $keyValue = [];
//        foreach ($powerData as $t) {
//            $id = $t->id; // 1880
//            $key = array_search($id, $powerArray);  // 1
//            $keyValue[$key] = $t->QC == $goodStatus ? $t->value : -100;
//        }
//        return $keyValue;
//    }

    // создает строку адресов параметров из СК
    // "1400,1409,1417,1435,1441,1447,1453,1462,1470,1477,1524,1532"
    public function gesIdString($gesIdArray)
    {
        $gesIdString = '';
        foreach ($gesIdArray as $a) {
            $gesIdString = $gesIdString . $a . ',';
        }
        return rtrim($gesIdString, ", ");
    }

    public function createDataArray($ids, $data, $goodStatus){
        $result = [];
        $status = true;

        foreach($ids as $key => $value) {
            // $key = 'ges1';   $value = '1400'
            foreach($data as $d) {
                if($d->id == $value) {
                    if(in_array($d->QC, $goodStatus)){
                        $result[$key] =  round($d->value, 1);
                    } else {
                        $result[$key] =  '-100';
                        $status = false;
                    }

                }
            }
        }
        $result['status'] = $status;
        return $result;

    }

}
