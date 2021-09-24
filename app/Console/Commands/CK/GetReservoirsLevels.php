<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;


class GetReservoirsLevels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getReservoirsLevels';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =  'Выгружает из ОИК СК-2007 значения уровней ВДХ';

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
        $reservoirsClassArray = [
            1827 => "ReservoirSandal",
            1825 => "ReservoirSegozero",
            1826 => "ReservoirVigozero",
            1824 => "ReservoirUshkozero",
            1823 => "ReservoirGirvas",
        ];

        $reservoirsTableArray = [
            1827 => "reservoir_sandals",
            1825 => "reservoir_segozeros",
            1826 => "reservoir_vigozeros",
            1824 => "reservoir_ushkozeros",
            1823 => "reservoir_girvas",
        ];

           
        $conn = DB::connection('sqlsrv');
        // $now = "20210526 17:00:00";
        // $now = Carbon::now('Europe/Moscow')->subDays(8)->format('Ymd');
        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');
        $nowYmd = Carbon::now('Europe/Moscow')->format('Ymd');
        $dateForUpdate = Carbon::now('Europe/Moscow')->subDays(30)->format('Ymd');
        
        // $now = "20210519";

        $yearIsLeap = Carbon::now('Europe/Moscow')->isLeapYear();

        $lastDays = $yearIsLeap ? [
            "29-02" => 2,
            "30-04" => 1,
            "30-06" => 1,
            "30-09" => 1,
            "30-11" => 1
        ] : [
            "28-02" => 3, 
            "30-04" => 1,
            "30-06" => 1,
            "30-09" => 1,
            "30-11" => 1
        ];


        $nowDayMonth = Carbon::now('Europe/Moscow')->format('d-m');

        $sql = "
    EXEC OIK.dbo.SrezLT
        @Cat = ?,
        @Ids = ?,
        @Time = '". $now . "'
";
        // $params = array("W", "70", $now);
        $params = array("П", "1823,1824,1825,1826,1827", $now);
        $stmt = $conn->select($sql, $params);

        foreach($stmt as $reservoir) {

            $CKid = $reservoir->id;

            $resevoirName = $reservoirsClassArray[$CKid];
            $resevoirTable = $reservoirsTableArray[$CKid];
            $resevoirFullName = "App\Models\Reservoirs\\" . $resevoirName;
            $reservoirValue = $resevoirFullName::where('created_at', Carbon::today())->get();

            // В СК нет значений и не создан
            if((int)$reservoir->value == 0 && $reservoirValue->isEmpty()) {
                $resevoirFullName::create([
                    'waterLevel' => -100,
                    'created_at' => Carbon::today(),
                ]);
            }
            // В СК есть значения и создан -100
            elseif((int)$reservoir->value !== 0 && $reservoirValue->isNotEmpty()) {
                DB::table($resevoirTable)
                    ->where('created_at', Carbon::today())
                    ->update([
                    'waterLevel' => (float)$reservoir->value,
                ]);
            }
            // В СК есть значения и не создан 
            elseif((int)$reservoir->value !== 0 && $reservoirValue->isEmpty()){
                $resevoirFullName::create([
                    'waterLevel' => (float)$reservoir->value,
                    'created_at' => Carbon::today(),
                ]);
            }

            if(array_key_exists($nowDayMonth, $lastDays) && $reservoirValue->isEmpty()) {
                $emptyDaysNumber = $lastDays[$nowDayMonth];
            
                for($i = 0;  $i < $emptyDaysNumber; $i++) {
                    $resevoirFullName::create([
                        'waterLevel' => -100,
                        'created_at' => Carbon::today(),
                    ]);
                }
            }
             
            $lastFifteenReservoirs = DB::table($resevoirTable)->whereDate('created_at', '>' , $dateForUpdate)->get();

            foreach($lastFifteenReservoirs as $lastReservoir) {
                if($lastReservoir->waterLevel == -100) {
                    $lastDate = Carbon::createFromFormat('Y-m-d H:i:s', $lastReservoir->created_at, 'Europe/Moscow')->format('Ymd');

                    $sql = "
                        EXEC OIK.dbo.SrezLT
                            @Cat = ?,
                            @Ids = ?,
                            @Time = '". $lastDate . "'
                    ";   

                    $lastParams = array("П", $CKid, $lastDate);
                    $dataFromCK = $conn->select($sql, $lastParams);

                    $valueFromCK = $dataFromCK[0]->value;

                    if($valueFromCK != 0) {
                        $toUpdate = DB::table($resevoirTable)->whereDate('created_at', '=' ,  $lastDate)->get();
                        $id = $toUpdate[0]->id;

                        $resevoirFullName::find($id)->update([
                            'waterLevel' => (float)$valueFromCK,
                        ]);
                    }
                    
                }
            }

        }


        // foreach($stmt as $reservoir) {
        //     $resevoirName = $reservoirsClassArray[$reservoir->id];
        //     $resevoirTable = $reservoirsTableArray[$reservoir->id];

        //     $resevoirFullName = "App\Models\Reservoirs\\" . $resevoirName;

        //     $reservoirValue = $resevoirFullName::where('created_at', Carbon::today())->get();

        //     // В СК нет значений и не создан
        //     if((int)$reservoir->value == 0 && $reservoirValue->isEmpty()) {
        //         $resevoirFullName::create([
        //             'waterLevel' => -100,
        //             'created_at' => Carbon::today(),
        //         ]);
        //     }
        //     // В СК есть значения и создан -100
        //     elseif((int)$reservoir->value !== 0 && $reservoirValue->isNotEmpty()) {
        //         DB::table($resevoirTable)
        //             ->where('created_at', Carbon::today())
        //             ->update([
        //             'waterLevel' => (float)$reservoir->value,
        //         ]);
        //     }
        //     // В СК есть значения и не создан 
        //     elseif((int)$reservoir->value !== 0 && $reservoirValue->isEmpty()){
        //         $resevoirFullName::create([
        //             'waterLevel' => (float)$reservoir->value,
        //             'created_at' => Carbon::today(),
        //         ]);
        //     }
        // }
        return 0;
    }
}



// 1823 - Girvas
// 1824 - Uskhozero
// 1825 - Segoaero
// 1826 - Vigozero
// 1827 - Sandal
