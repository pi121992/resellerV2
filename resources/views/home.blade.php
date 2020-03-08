@extends('layouts.appHome')

@section('content')
   <div class="row">

     <div class="col-12 col-md-4">
       @component('components.price',[
        'type'=>'warning',
        'btn'=>'Incia tu demo',
        'title'=>'Demo',
        'price'=>'$0',
        'url'=>'/demo'
        ])
       @endcomponent
     </div>

     <div class="col-12 col-md-4">
       @component('components.price',[
        'title'=>'Basic / $5 each',
        'price'=>'$5',
        'btn'=>"Inicia con 1 credito"

        ])
         
       @endcomponent
     </div>
     <div class="col-12 col-md-4">
       @component('components.price',[
        'title'=>'Premiun/ $4 each',
        'price'=>'$20',
        'btn'=>"Inicia con 5 creditos"]
        )
        
       
       @endcomponent
       </div>
       <div class="col-12 col-md-4">
       @component('components.price',[
        'title'=>'Advanced/ $3.5 each',
        'price'=>'$35',
        'btn'=>"Inicia con 10 creditos"
        ])
        @endcomponent
     </div>
     <div class="col-12 col-md-4">
       @component('components.price',[
        'title'=>'Master/ $3 each',
        'price'=>'$60',
        'btn'=>"Inicia con 20 creditos"])
       
     @endcomponent
     </div>

   </div>


     

@stop