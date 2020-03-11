<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ruletaController extends Controller
{
    public function index(){
         session_start();
         //session_destroy();
    	 return view('ruleta');
    }

    public function ajaxRequestPost(Request $request){
    	session_start();
        
$valor=$request->valor;

preg_match_all('|(\d+).*?(\w+)|', $valor, $matches);
   $tiempo=$matches[1][0];
   $formato=$matches[2][0];
   $myTime=intval($_SESSION['timeAdd']);
   if($formato=="H"){
     $totalMin=$_SESSION['timeAdd']=$myTime+$tiempo*60;
     
   }else{
   	 $totalMin=$_SESSION['timeAdd']=$myTime+$tiempo;
   }
   return  "Total: ".(round($totalMin/60,1))." Hora".$_SERVER['HTTP_USER_AGENT'];
}
}
