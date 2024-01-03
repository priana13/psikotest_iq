<?php

namespace App\Console;

use App\Http\Controllers\Api\WaktuUjianController;
use App\Http\Controllers\CronJobController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Membership;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->call([CronJobController::class , 'expired'])->daily();

        $schedule->call(function () {
                    
            $hari_ini = Carbon::now();
            
            Membership::where('end', '<=', $hari_ini)->update([
                'status' => 'expired'
            ]);
            
        })->hourly();

        $schedule->call([
            WaktuUjianController::class, 'kurangi_waktu'
        ])->everyMinute();


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


    // php artisan short-schedule:run
    protected function shortSchedule(\Spatie\ShortSchedule\ShortSchedule $shortSchedule)
    {       

        // this artisan command will run every second
        // "\App\Http\Controllers\Api\WaktuUjianController@kurangi_waktu"
        $shortSchedule->command(
            "pr:kurangi-waktu"            
        )->everySecond();
        
        // this artisan command will run every second, its signature will be resolved from container
        // $shortSchedule->command(\Spatie\ShortSchedule\Tests\Unit\TestCommand::class)->everySecond();
    }

}
