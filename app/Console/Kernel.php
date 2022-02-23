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
        Commands\EnsureQueueListenerIsRunning::class,
        Commands\UpdateWallets::class,
        Commands\UpdateCoinPrices::class,
        Commands\SyncMailchimp::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:checkup')->everyFiveMinutes();
        $schedule->command('wallet:update')->everyThirtyMinutes();
        $schedule->command('coins:update')->everyTenMinutes();
        $schedule->command('sync:mailchimp')->daily();
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
