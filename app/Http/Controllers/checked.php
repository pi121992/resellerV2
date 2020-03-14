<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\demoModel;
use App\plexUser;
use App\plexAdmin\plex;
use App\freeModel;
class checked extends Controller
{
    public function index(){
    	$plex=new plex;
    	$date=date('Y-m-d h:i:s');
        $datePlexFree=date('y-m-d h:i:s');
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

        $usuariosGratisVencido=freeModel::where('date',"<",$datePlexFree)->get();


        $playing= $plex->playing();

        $file=file_get_contents($plex->ip."/status/sessions/all?X-Plex-Token=".$plex->token);
        
        for ($i=0; $i < count($usuariosGratisVencido); $i++) { 
            $email_id=$usuariosGratisVencido[$i]->email_id;

            preg_match_all('|User\sid="'.$email_id.'".*?\n.*\n.Session\sid="(.*?)"|', $file, $matches);

            if(isset($matches[1][$i])){
                $plex->stop($matches[1][$i],"No tienes HORAS diponibles recuerda abrir APP TECNOPLEX para ganar mas horas");
            }
            

            echo $usuariosGratisVencido[$i]->email;
            $diasPasados=strtotime($datePlexFree) - strtotime($usuariosGratisVencido[$i]->date);
            $diasPasados=round($diasPasados/60/60/24,0);
            if($diasPasados>3){
                $email_id=$usuariosGratisVencido[$i]->email_id;
                $usuario_id=$usuariosGratisVencido[$i]->id;
                $borarUsuario=freeModel::find($usuario_id);
                $borarUsuario->delete();
                $plex->delete_user($email_id);
                echo "Borrado ".$usuariosGratisVencido[$i]->email;;
            }

            
        }
    	
    }
}
