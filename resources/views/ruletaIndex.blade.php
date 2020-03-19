@extends('layout.ruletaPlantilla')


@section('body')

@if (isset($_GET['msg']))
         <div class="p-2 mb-4 text-white text-center font-weight-bold alert-{{ $_GET['type'] }}"> 
         	<img src="https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/11-512.png" width="32">
    	{{ $_GET['msg'] }}
    	</div>
    @endif
  <div class="row">
    <div class="col-12 text-center pb-4">
         <button type="button" class="btn btn-dark">
          Cuentas disponibles <span class="badge badge-light">{{ $cuentasDisponibles }}</span>
        </button>
    </div>
     @if ($cuentasDisponibles>0)
       <div class="col-12">
        <a href="go:ruleta" class="btn btn-primary d-block">Entra y Gana!!</a>
       </div>
      @else
        <div class="col-12 alert-danger">
          Lo Siento pero no hay cuantas Gratis Disponibles En este momento
          si deseas una cuenta premium ve a https://compraplex.com
       </div>
     @endif
  	
  </div>
@endsection