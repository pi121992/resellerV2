<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\demoModel;
use App\plexAdmin\plex;
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
         //$schedule->command('user:delete')->everyMinute();
        $schedule->call(function () {
           $plex=new plex;
        $date=date('Y-m-d h:i:s');
        /*$ipInfo = file_get_contents('http://ip-api.com/json');
        $ipInfo = json_decode($ipInfo);
       $ipInfo->timezone;*/

        $usuariosVencidos=demoModel::where('date',"<",$date)->get();
        for ($i=0; $i < count($usuariosVencidos); $i++) { 
            $eliminar=demoModel::find($usuariosVencidos[$i]->id);
            $plexID=$eliminar->plexEmailId;
            $plex->delete_user($plexID);
            echo "Se elimino a ".$eliminar->email;
            $eliminar->delete();

        }
        })->everyMinute();
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
