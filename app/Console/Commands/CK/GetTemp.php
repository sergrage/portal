<?php

namespace App\Console\Commands\CK;

use Carbon\Carbon;
use Illuminate\Console\Command;

use App\Models\CK\Temperature;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class GetTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getTemperature';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 значения температуры по всем станциям';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ges1Id = '6671';
        $ges2Id = '7155';
        $ges3Id = '8598';
        $ges5Id = '5154';
        $ges6Id = '5529';
        $ges7Id = '6037';
        $ges9Id = '1225';
        $ges10Id = '1721';
        $ges14Id = '2601';
        $ges16Id = '2981';
        $tec13Id = '596';

        $tempArray = [
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

        $conn = DB::connection('sqlsrv');
        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');

        $sql1 = "
            DECLARE @dt1 date;
            DECLARE @dt2 date;
            SET @dt = '".$now."'".";
            SET @dt = '".$now."'".";
            EXEC OIK.dbo.StepLT
            @Cat = ?,
            @Ids = ?,
            @Start = @dt1,
            @Stop = @dt2
        ";

        $sql = "
            EXEC OIK.dbo.SrezLT
            @Cat = ?,
            @Ids = ?,
            @Time = '". $now . "'
        ";

        $params = array("I", $this->gesIdString($tempArray));

        try{
            $temperatures = $conn->select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            Temperature::create([
            'ges1' =>  -100,
            'ges2' =>  -100,
            'ges3' =>  -100,
            'ges5' =>  -100,
            'ges6' =>  -100,
            'ges7' =>  -100,
            'ges9' =>  -100,
            'ges10' =>  -100,
            'ges14' =>  -100,
            'ges16' =>  -100,
            'tec13' =>  -100,
            'status' => false
            ]);

            return 0;
        }

        $idValueArray = $this->keyValueArray($temperatures, $tempArray);

        Temperature::create([
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
            'status' =>  $this->getStatus($temperatures)
        ]);

        return 1;
    }

    public function getStatus($temperatureData) {
        $statuses = Arr::pluck($temperatureData, 'QC');
        if(in_array('128', $statuses)) {
            return false;
        }
        return true;
    }

    public function keyValueArray($temperatureData,  $tempArray) {
        $keyValue = [];
        foreach($temperatureData as $t) {
           $id = $t->id; // 1880
            $key = array_search($id, $tempArray);  // 1
//            if($t->QC == '256') {
//                $keyValue[$key] = $t->value;
//            } else {
//                $keyValue[$key] = -100;
//            }
            $keyValue[$key] = $t->QC == '256' ? $t->value : -100;

        }
        return $keyValue;
    }

    public function gesIdString($gesIdArray) {
        $gesIdString = '';
        foreach($gesIdArray as $a) {
            $gesIdString = $gesIdString . $a . ',';
        }
        return rtrim($gesIdString, ", ");
    }
}
