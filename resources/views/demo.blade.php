@extends('layouts.appHome')

@section('content')

<h1 class="text-danger"><em>Inicia tu negocio con plex</em> </h1>
   <h2 class="text-darks">Demo:</h2>

@if (isset($_GET['msg']) && isset($_GET['type']) )
    @component('components.alertEdit',['type'=>$_GET['type']])
        {{strtoupper ($_GET['msg'])}}
    @endcomponent

    
@endif

<form method="POST">
    @csrf
    <div class="form-group">
        <label for="email">correo de plex:</label>
        <input id="email" class="form-control" type="email" name="emailDemo" placeholder=" ingresa aqui el correo q recibira el demo">
        <small class="text-success">Recuerda que este correo tiene que estar registrado en <a href="https://plex.tv">plex.tv</a></small>
    </div>

    <button type="submit" class="btn btn-primary"> Enviar demo</button>
    
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

       
       

      
                 @if (isset($myUsersDemo[0]))
                   <h2>Mis Demos:</h2>
                 @endif
                 <div class="row">
                @foreach ($myUsersDemo as $user)

                    <div class="col-md-4">
                        @component(
                            'components.card',
                            ['title'=>$user->email,
                            'email'=>'',
                            'id'=>'',
                            'status'=>'',
                            'btn'=>'',
                            'date'=>$user->date]
                            )
                        @endcomponent
                    </div>
                @endforeach
           
       </div>
       
@stop