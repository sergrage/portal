<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CK\Askue;
use App\Services\CK\SrezService;

class RefreshAskue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:refreshAskue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Переоправшивает данные АСКУЭ, если они не пришли вовремя';
    private $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SrezService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $ids = DB::table('askues')->where('status', 0)->pluck('id');

        foreach($ids as $id) {
            $model = Askue::find($id);
            $time = $model->created_at->format('Ymd H:i:s');


            $sql = "
                EXEC OIK.dbo.SrezLT
                @Cat = ?,
                @Ids = ?,
                @Time = '" . $time . "'
            ";
            $conn = DB::connection('sqlsrv');
            $params = array('Л', "1400,1409,1417,1435,1441,1447,1453,1462,1470,1477,1524,1532");
            $dataFromDB = $conn->select($sql, $params);
            $status = true;
            foreach($dataFromDB as $s) {
                if($s->value == -100) {
                    $status = false;
                }
            }

            $model->update([
                'ges1' => round($dataFromDB[0]->value,2),
                'ges2' => round($dataFromDB[1]->value,2),
                'ges3' => round($dataFromDB[2]->value,2),
                'ges5' => round($dataFromDB[3]->value,2),
                'ges6' => round($dataFromDB[4]->value,2),
                'ges7' => round($dataFromDB[5]->value,2),
                'ges9' => round($dataFromDB[6]->value,2),
                'ges10' => round($dataFromDB[7]->value,2),
                'ges14' => round($dataFromDB[8]->value,2),
                'ges16' => round($dataFromDB[9]->value,2),
                'tec13' => round($dataFromDB[10]->value,2),
                'mges' => round($dataFromDB[11]->value,2),
                'status' =>  $status
            ]);

         }

        return 0;
    }
}
