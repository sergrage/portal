<?php

namespace App\Console\Commands\CK;


use App\Models\CK\Level;
use App\Services\CK\SrezService;
use Illuminate\Console\Command;

class GetLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getLevel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 значения верхнего бьефа по всем станциям';

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
            ->getParameters(Level::class,
                ['ges1'=>'1848','ges2'=>'1850','ges3'=>'1838',
                 'ges5'=>'1842','ges6'=>'1844', 'ges7'=>'1846',
                 'ges9'=>'1830','ges10'=>'1832','ges14'=>'1834',
                 'ges16'=>'1836'],
                ['67108864', '48'],
                "Л");
    }
}
