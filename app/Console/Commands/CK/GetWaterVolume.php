<?php

namespace App\Console\Commands\CK;

use App\Models\CK\WaterVolume;
use App\Services\CK\SrezService;
use Illuminate\Console\Command;

class GetWaterVolume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getWaterVolume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 значения ВБ и ВДХ ручные вводы';

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
        return $this->service
            ->getParameters(WaterVolume::class,
                ['ges3'=>'72', 'ges7'=>'71', 'ges9'=>'75','ges14'=>'73', 'girvas'=>'70', 'ges9Reservoir'=> '75'],
                ['32768', '2'],
                "W");
    }
}
