<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

use App\Models\Reservoirs\ReservoirsStatistic;

use Illuminate\Support\Facades\DB;

class ReaervoirStatistic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:createReservoirStatistic {reservoirName} {--update=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заполняет таблицу ReservoirStatistic за последние 10 лет';

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
        $reservoirName = "App\Models\Reservoirs\\" . $this->argument('reservoirName');
        $update = $this->option('update');

        $date = Carbon::now()->year;

        $from = date(($date-10) . '-01-01');
        $to = date(($date) .'-01-01');

        $reservoirLevel =  $reservoirName::whereBetween('created_at', [$from, $to])->where('waterLevel', '<>', -100)->get();

        $max = lcfirst($this->argument('reservoirName') . 'Max');
        $min = lcfirst($this->argument('reservoirName') . 'Min');
        $avg = lcfirst($this->argument('reservoirName') . 'Avg');


        for ($i = 0; $i <= 364; $i++) {
            $collection = collect();
            for ($y = 0; $y <= 9; $y++) {
                $collection->push($reservoirLevel[365 * $y + $i]);
            }

                $createDate =  $collection[0]->created_at->format('d-m');
                $updateDay = $collection[0]->created_at->format('d');
                $updateMonth = $collection[0]->created_at->format('m');

                if($update == "true") {
                    DB::table('reservoirs_statistics')
                    ->whereMonth('created_at', $updateMonth)
                    ->whereDay('created_at', $updateDay)
                    ->update([
                        $max => $collection->max('waterLevel'),
                        $min => $collection->min('waterLevel'),
                        $avg => $collection->avg('waterLevel'),    
                    ]);
                } else {
                    ReservoirsStatistic::create([
                        $max => $collection->max('waterLevel'),
                        $min => $collection->min('waterLevel'),
                        $avg => $collection->avg('waterLevel'),
                        'created_at' =>  Carbon::createFromFormat('d-m', $createDate),
                    ]);
                }
        }


        // return 0;
    }
}
