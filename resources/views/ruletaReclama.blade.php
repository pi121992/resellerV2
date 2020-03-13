@php
	session_start();
	$userAgent=$_SESSION['userAgent'];
	$timeAdd=$_SESSION['timeAdd'];
	$horas=round($timeAdd/60,1);
@endphp
@extends('layout.ruletaPlantilla')

@section('body')

    @if (isset($_GET['msg']))
    	<div class="alert-{{ $_GET['type']  }} h3 text-center">
			{{ $_GET['msg'] }}
		</div>
    @endif
	<form method="post">
		@if ($horas>0)
		@csrf
        <div class="col-12 d-lg-none">
    	<div  class="alert-secondary p-2 font-weight-bold text-muted text-center mb-5">Felicidades Has Ganado {{ $horas }} Horas</div>
    </div>
		<div class="form-group">
			<input type="email" required name="email" class="form-control" placeholder="Email al que se agregaran las horas">
		</div>

		<div class="form-group">

            
            	<input type="submit" name="" class="btn font-weight-bold btn-primary" value="Agragar horas">


                <a class="btn font-weight-bold btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
				Selecciona tus librerias
			  </a>

			  <div class="alert-warning mt-5">
			  	<label class="text-danger text-uppercase font-weight-bold"> AVISO</label> el email que agregues ya debe de estar registrado en plex.tv
			  </div>


            	@else
            	  <div class="alert-danger mb-5">No Tienes Horas Ganadas</div>
            @endif
			
		</div>





		

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
@endsection


