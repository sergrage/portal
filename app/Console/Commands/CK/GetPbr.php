<?php

namespace App\Console\Commands\CK;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\CK\Pbr;

class GetPbr extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getPbr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 значения ПБР по всем станциям';

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
        $this->deleteIfExists();

        $ges1Id = '4410';
        $ges2Id = '4422';
        $ges3Id = '4434';
        $ges5Id = '4458';
        $ges6Id = '4470';
        $ges7Id = '4482';
        $ges9Id = '4494';
        $ges10Id = '4506';
        $ges14Id = '4530';
        $ges16Id = '4542';
        $tec13Id = '4518';

        $gesArray = [
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

        $now = Carbon::now('Europe/Moscow')->format('Ymd');

        $sql = "
            EXEC OIK.dbo.SrezLT
            @Cat = ?,
            @Ids = ?,
            @Time = ?
        ";

        for($count = 0; $count <24; $count++) {
            try{
                $hour = $this->createHour($count);
                $conn = DB::connection('sqlsrv');
                $pbr = $conn->select($sql, ["Л", $this->gesIdString($gesArray), $now.' '. $hour .':00:00']);

                Pbr::create([
                    'ges1' => $pbr[0]->value,
                    'ges2' => $pbr[1]->value,
                    'ges3' => $pbr[2]->value,
                    'ges5' => $pbr[3]->value,
                    'ges6' => $pbr[4]->value,
                    'ges7' => $pbr[5]->value,
                    'ges9' => $pbr[6]->value,
                    'ges10' => $pbr[7]->value,
                    'ges14' => $pbr[9]->value,
                    'tec13' => $pbr[8]->value,
                    'ges16' => $pbr[10]->value,
                    'status' =>  $this->getStatus($pbr)
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                for($count = 0; $count <24; $count++) {
                    Pbr::create([
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
                }
                return 0;
            }
        }
        return 1;
    }

    public function gesIdString($gesIdArray) {
        $gesIdString = '';
        foreach($gesIdArray as $a) {
            $gesIdString = $gesIdString . $a . ',';
        }
        return rtrim($gesIdString, ", ");
    }

    public function createHour($hour) {
        return Carbon::createFromTime($hour)->format('H');
    }

    public function getStatus($pbrData) {
        $statuses = Arr::pluck($pbrData, 'QC');
        foreach($statuses as $s) {
            if($s !== "64") {
                return false;
            }
        }
        return true;
    }

    public function deleteIfExists(){
        Pbr::whereDate('created_at', Carbon::today())->delete();
     }
}
