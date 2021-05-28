<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        ];
        $reservoirsTableArray = [
            1827 => "reservoir_sandals",
            1825 => "reservoir_segozeros",
            1826 => "reservoir_vigozeros",
            1824 => "reservoir_ushkozeros",
        ];


        $conn = DB::connection('sqlsrv');
        // $now = "20210526 17:00:00";
        // $now = Carbon::now('Europe/Moscow')->subDays(8)->format('Ymd');
        $now = Carbon::now('Europe/Moscow')->format('Ymd H:i:s');
        $nowYmd = Carbon::now('Europe/Moscow')->format('Ymd');
        $dateForUpdate = Carbon::now('Europe/Moscow')->subDays(15)->format('Ymd');
        
        // $now = "20210519";

        $sql = "
    EXEC OIK.dbo.SrezLT
        @Cat = ?,
        @Ids = ?,
        @Time = '". $now . "'
";
        // $params = array("W", "70", $now);
        $params = array("П", "1824,1825,1826,1827", $now);
        $stmt = $conn->select($sql, $params);

        // dd($stmt);

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
                    dd($dataFromCK);
                    $id =(int)$dataFromCK[0]->id;

                    // $r = $resevoirFullName::where('id', $id)->first();
                    dd($resevoirFullName::find($id));
                    $resevoirFullName::find($id)->update([
                        'waterLevel' => (float)$valueFromCK,
                    ]);
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



// 1824 - Uskhozero
// 1825 - Segoaero
// 1826 - Vigozero
// 1827 - Sandal
