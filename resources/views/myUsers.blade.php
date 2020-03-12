
@extends('layouts.appHome')
@php
	{{@$state=$_GET['state'];}}
@endphp

@section('content')
<h1 class="text-danger"><em>Inicia tu negocio con plex</em> </h1>
   <h2 class="text-darks">My users:</h2>
<div class="alert-{{ $deleteStatus ?? ''}}">
	@if (isset($deleteStatus) && $deleteStatus=="danger")
		Eliminastes a:{{ $name }}
	@endif

	@if (isset($deleteStatus)=="info")
		Este usuario  No existe 
	@endif
</div>

	@component('components.alert',['type'=>$state])@endcomponent
    <div class="row">
		@foreach($myUsers as $my_user =>$value)
		  @php
		  	{{ if(strtotime($value->date)>strtotime(date('y-m-d'))){
		  		$status="Activo";
		  	}else{
		  		$status="Vencido";
		  	    }
		     }}
		  	
		  @endphp
		  <div class="col-12 col-md-3 d-flex align-items-stretch">
		  	@component('components.card',['title'=>$value->name,'email'=>$value->email,'id'=>$value->id,'status'=>$status,'date'=>date('d M Y',strtotime($value->date.' '))])
		  	@endcomponent
		  </div>
		  
		@endforeach
    </div>

@stop