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
              'ges16'=>'2981','tec13'=>'596'], ['256'], "I");
      }
}
