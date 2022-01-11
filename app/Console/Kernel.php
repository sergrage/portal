<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

//# *    *    *    *    *  command to execute
//# ┬    ┬    ┬    ┬    ┬
//# │    │    │    │    │
//# │    │    │    │    │
//# │    │    │    │    └───── day of week (0 - 6) (0 to 6 are Sunday to Saturday)
//# │    │    │    └────────── month (1 - 12)
//# │    │    └─────────────── day of month (1 - 31)
//# │    └──────────────────── hour (0 - 23)
//# └───────────────────────── min (0 - 59)



        // $schedule->command('inspire')->hourly();
        $schedule->command('command:getTemperature')->hourly();
        $schedule->command('command:getLevel')->hourly();
        $schedule->command('command:getPower')->hourlyAt(1);
//        $schedule->command('command:getPower')->cron('* 0-23 * * *');

        $schedule->command('command:getPbr')->cron('30 0 * * *');
        $schedule->command('command:getAskue')->cron('55 * * * *');
        $schedule->command('command:getWaterVolume')->cron('15 0,7,11,14,17,21 * * *');
        $schedule->command('command:getWater')->cron('15 * * * *');

        $schedule->command('command:getReservoirsLevels')->twiceDaily(10, 11);
//        $schedule->command('command:getPower')->cron('5 * * * *');
        $schedule->command('command:createReservoirStatistic ReservoirGirvas --update=true')->cron('1 1 1 1 *');
        $schedule->command('command:createReservoirStatistic ReservoirSandal --update=true')->cron('1 1 1 1 *');
        $schedule->command('command:createReservoirStatistic ReservoirSegozero --update=true')->cron('1 1 1 1 *');
        $schedule->command('command:createReservoirStatistic ReservoirUshkozero --update=true')->cron('1 1 1 1 *');
        $schedule->command('command:createReservoirStatistic ReservoirVigozero --update=true')->cron('1 1 1 1 *');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
