<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\demoModel;
use App\plexUser;
use App\plexAdmin\plex;
class checked extends Controller
{
    public function index(){
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
