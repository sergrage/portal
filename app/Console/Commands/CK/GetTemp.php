<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use App\Models\CK\Temperature;
use App\Services\CK\SrezService;


class GetTemp extends Command
{
    protected $service;

    protected $signature = 'command:getTemperature';
    protected $description = 'Выгружает из ОИК СК-2007 значения температуры по всем станциям';

    public function __construct(SrezService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle() {
         return $this->service->getParameters(Temperature::class,
             ['ges1'=>'6671', 'ges2'=>'7155','ges3'=>'8598',
              'ges5'=>'5154','ges6'=>'5529', 'ges7'=>'6037',
              'ges9'=>'1225','ges10'=>'1721','ges14'=>'2601',
              'ges16'=>'2981','wges1'=>'6672', 'wges2'=>'7156','wges3'=>'8599',
              'wges5'=>'5155','wges6'=>'5530', 'wges7'=>'6038',
              'wges9'=>'1226','wges10'=>'1722','wges14'=>'2602',
              'wges16'=>'2982','tec13'=>'596'], ['256'], "I");
      }
}
