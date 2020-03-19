<?php

namespace App\Http\Controllers;
use App\freeModel;
use App\plexAdmin\plex;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ruletaController extends Controller
{
    public function index(){

         session_start();
         //session_destroy();
         $plex=new plex;
         $file=file_get_contents("https://plex.tv/api/users?X-Plex-Token=".$plex->token);
         preg_match_all('|username="(.*?)"|', $file, $matches);

          $cuentasDisponibles=100-count($matches[1])-1;
        
         $_SESSION['userAgent']=$_SERVER['HTTP_USER_AGENT'];

         if($_SESSION['userAgent']=="pitunti"){

            return view('ruletaIndex',compact('cuentasDisponibles'));
         }else{
        return "<h1>NO ALLOWED</h1>";
      }
    	 
    }


    public function juega(){
      session_start();
      if($_SESSION['userAgent']=="pitunti"){

        return view('ruleta');
      }else{
        return "<h1>NO ALLOWED</h1>";
      }



    	
    }

    public function ayuda(){
      return view('ruletaAyuda');
    }

     public function reclama(){

      $plex=new plex;
      $library=$plex->library();
      return view('ruletaReclama',compact('library'));
    }

    public function store(Request $request ){
      session_start();
      $freeModel=new freeModel;
      $plex=new plex;
      $timeAdd=$_SESSION['timeAdd'];
      $existe=freeModel::where("email",$request->email)->get();
      if(isset($existe[0]->email)){
            $plex->add_email($request->email,$request->library);
            $effectiveDate = strtotime("+".$timeAdd." minutes", strtotime($existe[0]->date));
             $time = date("y-m-d h:i:s", $effectiveDate);
             $update=freeModel::find($existe[0]->id);
             $update->date=$time;
             $update->save();
             $_SESSION['timeAdd']=0;
             return redirect('/ruleta?msg=Agregado&type=success');
             
      }else{#si no existe en la base de datos

             #se comprueba si el email es valido y si es true lo agrega
             if($plex->email_is_valid($request->email)){
                 if($plex->add_email($request->email,$request->library)){
                    $email_id=$plex->get_id_pending($request->email);
                    $freeModel->ip=$request->ip();
                    $freeModel->email=$request->email;
                    $freeModel->email_id=$email_id;
                    $effectiveDate = strtotime("+".$timeAdd." minutes", strtotime(date("y-m-d h:i:s")));
                    $time = date("y-m-d h:i:s", $effectiveDate);
                    $freeModel->date=$time;
                    $freeModel->save();
                    $_SESSION['timeAdd']=0;
                    return redirect('/ruleta?msg=Agregado ve a plex.tv y acepta la invitacion&type=success');
                 }

             }else{#si el eamil es invalido
               return redirect('/ruleta/reclama?msg=Email invalido&type=danger');
             }
      }
    }

    public function ajaxRequestPost(Request $request){
    	session_start();
        
$valor=$request->valor;

preg_match_all('|(\d+).*?(\w+)|', $valor, $matches);
   $tiempo=$matches[1][0];
   $formato=$matches[2][0];
   if(isset($_SESSION['timeAdd'])){
   	$myTime=intval($_SESSION['timeAdd']);
   }else{
   	$_SESSION['timeAdd']=$tiempo;
   }
   
   if($formato=="H"){
     $totalMin=$_SESSION['timeAdd']=$myTime+$tiempo*60;
     
   }else{
   	 $totalMin=$_SESSION['timeAdd']=$myTime+$tiempo;

   }
   return  "Total Ganado: ".(round($totalMin/60,1))." Horas";
}
}
