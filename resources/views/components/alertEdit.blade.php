@if (isset($type))
	<div class="alert-{{$type}} text-center h5">	
	@else
	<div class="alert-info text-center h5">
@endif


	{{ $slot }}
</div>