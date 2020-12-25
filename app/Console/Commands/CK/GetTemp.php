<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use App\Models\CK\Temperature;
use App\Services\CK\SrezService;


class GetTemp extends Command
{
    protected $service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getTemperature';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выгружает из ОИК СК-2007 значения температуры по всем станциям';

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

      public function handle() {
         return $this->service->getParameters(Temperature::class, ['6671', '7155','8598','5154','5529','6037','1225','1721','2601','2981','596'], '256', "I");
      }

}
