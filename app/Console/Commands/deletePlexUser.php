<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\demoModel;
use App\plexUser;
use App\plexAdmin\plex;
class deletePlexUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'eliminar usuarios de plex';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

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
    }
}
