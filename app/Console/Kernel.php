<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\DowngradeExpiredRoles;
use App\Console\Commands\DeleteExpiredNews;

class Kernel extends ConsoleKernel
{
    /**
     * Register artisan commands.
     */
    protected $commands = [
        DowngradeExpiredRoles::class,
        DeleteExpiredNews::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('roles:downgrade-expired')->daily();
        $schedule->command('news:delete-expired')->daily();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
