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
