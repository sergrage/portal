<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use App\Services\CK\SrezService;
use App\Models\CK\Power;

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
         return $this->service
             ->getParameters(Power::class,
             ['49', '61','79','123','141','153','31','171','189','213','7'],
             '67108864',
             "Л");
    }

}
