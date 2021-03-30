<?php

namespace App\Console\Commands\CK;

use App\Models\CK\Askue;
use App\Services\CK\SrezService;
use Illuminate\Console\Command;

class GetAskue extends Command
{

    protected $signature = 'command:getAskue';
    protected $description = 'Выгружает из ОИК СК-2007 значения КУ по всем станциям';

    private $service;

    public function __construct(SrezService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle()
    {
        return $this->service
            ->getParameters(Askue::class,
                ['ges1'=>'1400','ges2'=>'1409','ges3'=>'1417',
                 'ges5'=>'1435','ges6'=>'1441', 'ges7'=>'1447',
                 'ges9'=>'1453','ges10'=>'1462','ges14'=>'1470',
                 'ges16'=>'1477','tec13'=>'1524','mges'=>'1532' ],
                ['67108864', '48'],
                "Л");
    }
}
