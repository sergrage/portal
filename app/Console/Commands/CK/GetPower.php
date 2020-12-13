<?php

namespace App\Console\Commands\CK;

use Illuminate\Console\Command;
use App\Services\CK\CKService;

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
    public function __construct(CKService $service)
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
        $this->service->power();
    }

}
