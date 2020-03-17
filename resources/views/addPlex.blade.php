@extends('layouts.appHome')

@section('content')


 <form method="POST">
    @csrf
     <div class="form-group">
        <i class="fas fa-at"></i>
         <label class="text-muted">Correo del usuario:</label>
         <input type="text" name="email" required name="" class="form-control" placeholder="Enter Email">
         <small>Este correo tiene que estar registrado en  <a href="https://plex.tv">PLEX.TV</a></small>
     </div>
     <div class="form-group">
        <i class="fas fa-calendar-day"></i>
         <label class="text-muted">Agregar paquete:</label>

         @if ($admin)
         <input type="date" name="month" class="form-control">

        @else
         <select class="form-control" name="month">
         	<option value="1">1 Mes</option> 
         	<option value="3">3 Meses</option> 
         	<option value="6">6 Meses</option> 
         	<option value="12">12 Meses</option> 
         </select>

         @endif
       
     </div>
     <div class="form-group">
        <i class="fas fa-user"></i>
         <label class="text-muted">Nombre:</label>
         <input type="text" name="name" required class="form-control" placeholder="Nombre del usuario">
        
     </div>

     <div class="form-group">
         <i class="fas fa-sticky-note"></i>
         <label class="text-muted">Note:</label>
         <input type="text" name="note" required class="form-control" placeholder="Comentarios extras">
         
     </div>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-user-plus"></i>
        Add
    </button>

    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Ver librerias
      </a>
    
    <div class="collapse" id="collapseExample">
      <div class="card card-body">
          <div class="form-group pt-4">
              <div class="row offset-md-3">
              @for ($i = 0; $i < count($library[1]); $i++)
                  @php
                    $checked='checked';
                    $color="info";
                    $mayor="";
                    if(strpos($library[2][$i],"xxx")){
                      $checked="";
                      $color="danger";
                      $mayor="Solo mayores de 18+";
                    } 
                  @endphp
                  <div class="col-12 col-md-3 mb-1 text-center ml-1 btn-{{$color}}">
                   <label class="btn ">
                   <input type="checkbox" name="library[]"{{$checked}} value="{{$library[1][$i]}}">{{$mayor}}<br> {{$library[2][$i]}}
                   </label>
                  </div>
               @endfor
               </div>
           </div>
       
      </div>
    </div>

 </form>
@stop