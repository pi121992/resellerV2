<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plexUser;
use Auth;
use App\plexAdmin\plex;


class myUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      $id="";
      if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $myDelete=plexUser::find($id);
        $seller=Auth::user()->email;
        if(isset($myDelete->seller) && $myDelete->seller==$seller){
            $plex=new plex;
            $plex->delete_user($myDelete->plex_id);
            $myDelete->delete();
            $name=$seller;
            $deleteStatus="danger";
        }else{
            $name="";
            $deleteStatus="info";
        }


      }
      
      $myUsers=plexUser::where('seller',Auth::user()->email)->orderBy('name')->get();
      
        return view('myUsers',compact('myUsers','deleteStatus','name'));
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

    {   $buscar=plexUser::where('email',$request->email)->get();
        
        $plexUser= plexUser::find($buscar[0]->id);

        return $plexUser->name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $plexUser= plexUser::find($id);
        
        return redirect('edit/?id='.$id);    }

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
        echo "ee";
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
