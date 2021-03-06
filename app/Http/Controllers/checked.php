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



        


     //var_dump($playing= $plex->playing());

         $file=file_get_contents($plex->ip."/status/sessions/all?X-Plex-Token=".$plex->token);
         preg_match_all('|User\sid="(.*?)".*?\n.*\n.Session\sid="(.*?)"|', $file, $matches1);

        for ($i=0; $i < count($matches1[1]); $i++) { 
            $email_id=$matches1[1][$i];

             $usuariosGratisVencido=freeModel::where('date',"<",$datePlexFree)->where('email_id',$email_id)->get();

             for ($m=0; $m < count($usuariosGratisVencido); $m++) { 
                  $pararID=$usuariosGratisVencido[$m]->email_id;

                   preg_match_all('|User\sid="('.$pararID.')".*?\n.*\n.Session\sid="(.*?)"|', $file, $matches);
             $plex->stop($matches[2][0],"No tienes HORAS diponibles recuerda abrir APP TECNOPLEX para ganar mas horas"); 

             echo "Se detuvo a ".$usuariosGratisVencido[$m]->email;
             }
          
             
             


        }


      $usuariosGratisVencidoAll=freeModel::where('date',"<",$datePlexFree)->get();

        for ($i=0; $i < count($usuariosGratisVencidoAll); $i++) { 
            

            $diasPasados=strtotime($datePlexFree) - strtotime($usuariosGratisVencidoAll[$i]->date);

          $diasPasados=round($diasPasados/60/60/24,0);

            if($diasPasados>3){
                $email_id=$usuariosGratisVencidoAll[$i]->email_id;
                $usuario_id=$usuariosGratisVencidoAll[$i]->id;
                $borarUsuario=freeModel::find($usuario_id);
                $borarUsuario->delete();
                $plex->delete_user($email_id);
                echo "Borrado ".$usuariosGratisVencidoAll[$i]->email;;
            }


            
        }
    	
    }
}
