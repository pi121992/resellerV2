@extends('layout.plantilla')


@section('body')
 <form method="post" action="/logout">
 	@csrf
 	<input type="submit" name="" value="Salir">
 </form>
@endsection