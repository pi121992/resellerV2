@php
	{{$editUser=$resultado[0];}}

@endphp
@extends('layouts.appHome')

@section('content')
    @component('components.alertEdit')
        {{ $msg }}
    @endcomponent
   <form method="POST" >
   	@csrf
    <div class="form-group">
   		<label>Fecha de vencimiento:<br>{{ date('d M Y',strtotime($editUser->date.' ')) }}</label>
   		
   	</div>

   	<div class="form-group">
   		<label>Nombre:</label>
   		<input type="text" class="form-control" name="name" value="{{ $editUser->name }}" required>
   	</div>
   	<div class="form-group">
   		<label>Email:</label>
   		<input type="email" class="form-control" name="email" value="{{ $editUser->email }}" required>
   	</div>

   	<div class="form-group">
   		<label>Notas:</label>
   		<input type="text" class="form-control" name="note" value="{{ $editUser->coment }}" required>
   	</div>

   	<div class="form-group">
   		<label>Action:</label>
   		<select class="form-control" name="month" required>
   			<option value="0">Update Data</option>
   			<option value="-1">Update Email</option>
   			<option value="1">Add 1 Month</option>
   			<option value="3">Add 3 Months</option>
   			<option value="6">Add 6 Months</option>
   			<option value="12">Add 12 Months</option>
   			
   		</select>
   	</div>

   	
   	<button type="submit" class="btn btn-info" name="">

   	<i class="fas fa-user-edit"></i>
   	Editar
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
