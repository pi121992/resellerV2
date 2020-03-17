<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\plexUser;
use App\User;
use App\plexAdmin\plex;
use App\demoModel;


class plexAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
d     * @return \Illuminate\Http\Response
     */
    public function index()


    {

        $plex=new plex;

        $admin=Auth::user()->admin;

        $library=$plex->library();
        return view('addPlex',compact('library','admin'));
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
    {   $plex=new plex;
        $msg;
        $msgState="";
        $credits=Auth::user()->credits;
        $admin=Auth::user()->admin;
        if($plex->email_is_valid($request->email)){

           if($admin!=0){

                $plex->add_email($request->email,$request->library);
                 $msg= "Invitacion enviada";
                 $msgState="success";
                 $plexUserID=$plex->get_id_pending($request->email);
                  $plexUser=new plexUser;
                    $resultadoUser=plexUser::where('email',$request->email)->get();
                    @$resultadoUserEmail=$resultadoUser[0]->email;
                    if($resultadoUserEmail==""){
                        if($resultadoUserEmail!=$request->email){
                            $plexUser->plex_id=$plexUserID;
                            $plexUser->email=$request->email;
                            $plexUser->name=$request->name;
                            $plexUser->coment=$request->note;
                            $plexUser->seller=Auth::user()->email;
                            $plexUser->date=$request->month;
                            $plexUser->save();
                        }
                    
                      }

           }
            
            if(intval($credits)>0 && intval($credits)>=intval($request->month) && $admin!=1){

                if($plex->add_email($request->email,$request->library)){

                    $msg= "Invitacion enviada";
                    $msgState="success";
                    $userMaster=User::find(Auth::user()->id);
                    $userMaster->credits=Auth::user()->credits- intval($request->month);
                    $userMaster->save();
                    #######################
                 
                    $plexUserID=$plex->get_id_pending($request->email);
                    
                    $plexUser=new plexUser;
                    $resultadoUser=plexUser::where('email',$request->email)->get();
                    @$resultadoUserEmail=$resultadoUser[0]->email;
                    if($resultadoUserEmail==""){
                        if($resultadoUserEmail!=$request->email){
                            $effectiveDate = strtotime("+".$request->month." months", strtotime(date("y-m-d")));
                            $time = date("y-m-d", $effectiveDate);
                            $plexUser->plex_id=$plexUserID;
                            $plexUser->email=$request->email;
                            $plexUser->name=$request->name;
                            $plexUser->coment=$request->note;
                            $plexUser->seller=Auth::user()->email;
                            $plexUser->date=$time;
                            $plexUser->save();
                        }
                    
                      }

                    
                }else{
                 //   echo "Ya exite en este servidor";
                    echo $msg= "Ya exite en este servidor";
                    $msgState="warning";
                    if(intval($credits)>0 && intval($credits)>=intval($request->month) ){

                    $userMaster=User::find(Auth::user()->id);
                    $userMaster->credits=Auth::user()->credits- intval($request->month);
                    $userMaster->save();
                    
                    $plexUser=new plexUser;
                    $resultadoUser=plexUser::where('email',$request->email)->get();
                    @$resultadoUserEmail=$resultadoUser[0]->email;
                    if($resultadoUserEmail==""){
                        if($resultadoUserEmail!=$request->email){
                    if($resultadoUser=demoModel::where('email',$request->email)->get()){
                       $plexUserID=$resultadoUser[0]->plexEmailId;
                       
                         $effectiveDate = strtotime("+".$request->month." months", strtotime(date("y-m-d")));
                            $time = date("y-m-d", $effectiveDate);
                            $plexUser->plex_id=$plexUserID;
                            $plexUser->email=$request->email;
                            $plexUser->name=$request->name;
                            $plexUser->coment=$request->note;
                            $plexUser->seller=Auth::user()->email;
                            $plexUser->date=$time;
                            $plexUser->save();
                             $removerDemo=demoModel::find($resultadoUser[0]->id);
                        $removerDemo->delete();

                           $msg= "Se paso de Demo A cuenta pagada";
                    $msgState="info";
                             }
                         }
                     }


                    }
                 


                  
                    
                                   
                    }
                
            }else{
              //  echo "No tienes Creditos";
                $msg= "No tienes Creditos";
                    $msgState="danger";

                
             
                

            }
        }else{
            //echo "Correo no valido";
            $msgState="dark";
        }
       
       return redirect('/MyUsers?state='.$msgState);
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
