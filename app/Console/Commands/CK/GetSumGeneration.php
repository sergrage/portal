<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GetSumGeneration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:GetSumGeneration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 суммарную активную мощность';

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
        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');
        $sql = "
            EXEC OIK.dbo.SrezLT
            @Cat = ?,
            @Ids = ?,
            @Time = '" . $now . "'
        ";
        // $params = array('I', "9142,596");
        $params = array('I', "596,598,1227,1729,2616,2989,5174,5540,6060,6667,7151,9142,12252");
        $paramsPbr = array("Л", "4410,4422,4434,4458,4470,4482,4494,4506,4530,4542,4518");
        
        $conn = DB::connection('sqlsrv');
        $dataFromDB = $conn->select($sql, $params);
        $dataFromDBPbr = $conn->select($sql, $paramsPbr);

        // dd(round(($dataFromDBPbr[0]->value), 1));
        // dd($dataFromDBPbr);

        $dataFromDBArray = [
            'ges1' => (int)$dataFromDB[9]->value, 
            'ges2' => (int)$dataFromDB[10]->value, 
            'ges3' => (int)$dataFromDB[12]->value, 
            'ges5' => (int)$dataFromDB[6]->value, 
            'ges6' => (int)$dataFromDB[7]->value, 
            'ges7' => (int)$dataFromDB[8]->value, 
            'ges9' => (int)$dataFromDB[2]->value, 
            'ges10' => (int)$dataFromDB[3]->value, 
            'ges14' => (int)$dataFromDB[4]->value, 
            'ges16' => (int)$dataFromDB[5]->value, 
            'tec13' => (int)$dataFromDB[1]->value, 
            'generation' => (int)$dataFromDB[11]->value, 
            'temperature' => round($dataFromDB[0]->value, 2),
            'ges1Pbr' => round(($dataFromDBPbr[0]->value), 1), 
            'ges2Pbr' => round(($dataFromDBPbr[1]->value), 1), 
            'ges3Pbr' => round(($dataFromDBPbr[2]->value), 1), 
            'ges5Pbr' => round(($dataFromDBPbr[3]->value), 1), 
            'ges6Pbr' => round(($dataFromDBPbr[4]->value), 1), 
            'ges7Pbr' => round(($dataFromDBPbr[5]->value), 1), 
            'ges9Pbr' => round(($dataFromDBPbr[6]->value), 1), 
            'ges10Pbr' => round(($dataFromDBPbr[7]->value), 1), 
            'ges14Pbr' => round(($dataFromDBPbr[9]->value), 1), 
            'ges16Pbr' => round(($dataFromDBPbr[10]->value), 1), 
            'tec13Pbr' => round(($dataFromDBPbr[8]->value), 1)
        ];        

        // dd($dataFromDB);

        // $temperature = round($dataFromDB[0]->value, 2);
        // $generation = (int)$dataFromDB[1]->value;

        // $result =  array($temperature, $generation);
        $this->line(json_encode($dataFromDBArray));

        return 1;
    }
}
