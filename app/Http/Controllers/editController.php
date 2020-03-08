<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plexUser;
use Auth;
use App\plexAdmin\plex;
use App\User;
class editController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       $msg="";
        if(isset($_GET['msg'])){
            $msg=$_GET['msg'];
        }
         $id=$_GET['id'];
         $plex=new plex;
        $library=$plex->library();
         $resultado=plexUser::where('id',$id)->get();
         @$vendedor=$resultado[0]->seller;
        if($vendedor==Auth::user()->email){
            return view("edit",compact('resultado','msg','library'));
        }else{
           return redirect('/?error=1');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=$_GET['id'];

        if($request->month>0){

            //Agregar creditos
            $plex=new plex;
            $userUpdate= User::find(Auth::user()->id);
            $userUpdatePlex=plexUser::find($id);
           if($userUpdate->credits>0 && $userUpdate->credits>=$request->month){
             $creditos_actuales=intval($userUpdate->credits);
             $creditos_a_quitar=intval($request->month);
             $userUpdate->credits=$creditos_actuales-$creditos_a_quitar;
              if(strtotime(date('y-m-d')) >strtotime($userUpdatePlex->date)){
                //si esta vencido
                $effectiveDate = strtotime("+".$request->month." months", strtotime(date('y-m-d')));
            $time = date('y-m-d', $effectiveDate);
              }else{
                //si no esta vencido
                $effectiveDate = strtotime("+".$request->month." months", strtotime(date($userUpdatePlex->date)));
            $time = date('y-m-d', $effectiveDate);

              }

             
        
             $userUpdatePlex->date=strval($time);
             $file=file_get_contents('https://plex.tv/api/users?X-Plex-Token='.$plex->token);
             preg_match_all('|User\sid="(.*?)"|', $file, $matches);
             $existe=false;

             for ($i=0; $i < count($matches[1]); $i++) { 
                 if($userUpdatePlex->plex_id==$matches[1][$i]){
                    $existe=true;
                    break;
                 }
                }
                if(!$existe){
                    if($plex->update($request->email,$userUpdate->plex_id,$request->library)){

                        if($userUpdatePlex->save()){
                            if($userUpdate->save()){
                              return redirect('/edit?id='.$id.'&msg=Se agrego el credito con exito');
                            }
                           
                         }
                         

                    }
                 }
            
             
           }else{
             return redirect('/edit?id='.$id.'&msg=No tienes suficientes Creditos para hacer esta operacion');
           }

        }else if($request->month<0){
            //actualizar email plex;
            echo "Update Emial";
           $userUpdate= plexUser::find($id);
          
           $plex=new plex;
           if(strtotime($userUpdate->date)>strtotime(date('y-m-d'))){
                if($plex->update($request->email,$userUpdate->plex_id,$request->library)){
                  $userUpdate->email=$request->email; 
                  $userUpdate->plex_id=$plex->get_id_pending($request->email);
                }
              $userUpdate->save();
               return redirect('/edit?id='.$id.'&msg=Email Actulizado');
           }else{
              return redirect('/edit?id='.$id.'&msg=No puedes Actaliar a un usuario vencido');
           }
        
        
          

        }

        else if($request->month==0){
            $userUpdate= plexUser::find($id);
             $userUpdate->name=$request->name;
           $userUpdate->coment=$request->note;
           $userUpdate->save();
           return redirect('/edit?id='.$id.'&msg=Informacion actualizada');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
