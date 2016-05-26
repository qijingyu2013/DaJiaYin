<?php

namespace DaJiaYin\Console;

use DaJiaYin\Models\Stock;
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
        Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('inspire')
//                 ->hourly();

        //每分钟抓取大圆银 行情数据
        $schedule->call(function () {
            //TODO 每分钟抓取大圆银 行情数据

            Stock::saveData();
        })->weekdays()->everyMinute();
    }
}
