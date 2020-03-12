<?php

namespace App\Http\Controllers;

use App\demoModel;
use Illuminate\Http\Request;
use App\plexAdmin\plex;
use Auth;
class demoController extends Controller
{
   public  function index(){
      $plex=new plex;
       $library=$plex->library();
       $clientIP = \Request::getClientIp(true);
       if(isset(Auth::user()->email)){
        $myUsersDemo=demoModel::where('seller',Auth::user()->email)->get();
      
       }else{
        $myUsersDemo=demoModel::where('ip',$clientIP)->get();
       }
       
       return view('demo',compact('library','myUsersDemo'));
    }
    

   public  function store(Request $request){

       $plex=new plex;
       $demoDb=new demoModel;
       
        $clientIP = \Request::getClientIp(true);
          //ip	plexEmailId	email	date
          $buscar=$demoDb->where('email',$request->emailDemo)->get();
        // $contador= count($demoDb->where('ip',$clientIP)->get());
         $creditos="";
         if(isset(Auth::user()->email)){
            $contador= count($demoDb->where('email',Auth::user()->email)->get());
             $creditos=Auth::user()->credits;
             if($creditos==0){
                $numeroDeDemos=2;
             }else{
                 $numeroDeDemos=($creditos*2);
             }
            $demoMsg="Ya usastes ".$contador." demos Ya no tienes mas demos tienes q esperar";
            
         }else if(isset(Auth::user()->email)&& $contador<$numeroDeDemos){
             
            $creditos=Auth::user()->credits;
             if($creditos==0){
                $numeroDeDemos=2;
             }else{
                 $numeroDeDemos=($creditos*2);
             }
            $demoMsg="Ya usastes ".$contador." demos Ya no tienes mas demos tienes q esperar";
         }else{
            $contador= count($demoDb->where('ip',$clientIP)->get());
            $numeroDeDemos=1;
            $demoMsg="Ya usastes ".$contador." demos Ya no tienes mas demos Registrate e inicia session para obtener otro demo";
         }
         
         

        if($contador < $numeroDeDemos){
         if(!isset($buscar[0]->email)){
            if($plex->email_is_valid($request->emailDemo)){
                if($plex->add_email($request->emailDemo,$request->library)){
                   $demoDb->date=$new_time = date("Y-m-d h:i:s", strtotime('+1 hours'));
                   $demoDb->email=$request->emailDemo;
                   $demoDb->ip=$clientIP;
                   $demoDb->plexEmailId=$plex->get_id_pending($request->emailDemo);
                   if(isset(Auth::user()->email)){
                    $demoDb->seller=Auth::user()->email;
                   }
                   $demoDb->save();
                  return  redirect('/demo?msg=El demo se envio corectamente&type=success');
                  }else{
                   return  redirect('/demo?type=danger&&msg=error email ya esta agregado');
                  }
      
             }else{
               return  redirect('/demo?type=danger&msg=Email no valido '.$request->emailDemo);
              }
         }
         else{
             return  redirect('/demo?msg=Ya ay un demo para esta cuenta&&type=danger');

            
            }
        
    }else{
        return  redirect('/demo?msg='.$demoMsg.'&&type=danger');
    }
}

}
