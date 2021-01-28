<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use App\Services\CK\SrezService;
use App\Models\CK\Power;
use Illuminate\Support\Facades\Artisan;

class GetPower extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getPower';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 значения нагрузки по всем станциям';

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
         // обновляем ПБР
         Artisan::call('command:getPbr');

        return $this->service
            ->getParameters(Power::class,
                ['ges1'=> '49', 'ges2'=>'61','ges3'=>'79',
                    'ges5'=>'123','ges6'=>'141','ges7'=>'153',
                    'ges9'=>'31','ges10'=>'171','ges14'=>'189',
                    'ges16'=>'213','tec13'=>'7'], ['67108864'],"Л");
    }

}
