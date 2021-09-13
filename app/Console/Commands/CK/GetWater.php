<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use App\Models\CK\Water;
use App\Services\CK\SrezService;

class GetWater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getWater';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 значения ХВ, платин и т.д.';

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
            ->getParameters(Water::class,
                ['segozero'=>'59', 'pl21'=>'60', 'pl25'=>'62','pl27'=>'63', 'ges9'=>'75', 'idleGes1'=>'57', 'idleGes2'=>'56','idleGes5'=>'64','idleGes6'=>'65','idleGes7'=>'61','idleGes9'=>'69','idleGes10'=>'68','idleGes14'=>'67','idleGes16'=>'66', 'oldBed' => '58', 'ges2Reservoir'=>'50'],
                ['1073741824', '67108864'],
                "W");
    }
}
