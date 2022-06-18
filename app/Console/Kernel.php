<?php

namespace App\Console;

use App\Jobs\Sms\ScheduleBirthdayMessages;
use App\Jobs\Sms\ScheduleBroadcasts;
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
        $schedule->call( new ScheduleBroadcasts )->everyMinute();

        $schedule->command('sms:schedule-birthday-messages')->dailyAt("00:00");
        $schedule->command('activitylog:clean')->quarterly();
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
