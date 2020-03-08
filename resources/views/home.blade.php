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
       <li>Demo solicita tu Demo has  <a href="/demo">click aqui</a> </li>
         <li>Tu tienes el control de tu cuenta</li>
         <li>2 conecciones simultaneas</li>
         <li>Mas de 40TB de contenido</li>
         <li>Actualizaciones diarias</li>
       @endcomponent
     </div>
     <div class="col-12 col-md-4">
       @component('components.price',['title'=>'Basic','price'=>'$5'])
       <li>1 credito</li>
         <li>Tu tienes el control de tu cuenta</li>
         <li>2 conecciones simultaneas</li>
         <li>Mas de 40TB de contenido</li>
         <li>Actualizaciones diarias</li>
       @endcomponent
     </div>
     <div class="col-12 col-md-4">
       @component('components.price',['title'=>'Premiun','price'=>'$22'])
         <li>5 creditos</li>
         <li>Tu tienes el control de tu cuenta</li>
         <li>2 conecciones simultaneas</li>
         <li>Mas de 40TB de contenido</li>
         <li>Actualizaciones diarias</li>
       @endcomponent
       </div>
       <div class="col-12 col-md-4">
       @component('components.price',['title'=>'Advanced','price'=>'$40'])
       <li>10 creditos</li>
       <li>Tu tienes el control de tu cuenta</li>
       <li>2 conecciones simultaneas</li>
       <li>Mas de 40TB de contenido</li>
       <li>Actualizaciones diarias</li>
     @endcomponent
     </div>
     <div class="col-12 col-md-4">
       @component('components.price',['title'=>'Master','price'=>'$70'])
       <li>20 creditos</li>
       <li>Tu tienes el control de tu cuenta</li>
       <li>2 conecciones simultaneas</li>
       <li>Mas de 40TB de contenido</li>
       <li>Actualizaciones diarias</li>
     @endcomponent
     </div>

   </div>


     

@stop