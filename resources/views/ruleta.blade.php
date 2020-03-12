@extends('layout.ruletaPlantilla')
@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row text-center">

	<div class="col-12 d-lg-none">
    	<div id="dataR"></div>
    </div>

    <div class="col-12 d-lg-none">
		<input type="button" class="btn-block btn-primary text-uppercase p-2 mt-3" value="Girar" id='Girar' />

		<a href="go:ruleta"> <input type="button" class="btn-block btn-warning text-uppercase p-2 mt-3" value="Otra vez" style="float:center;" id='intento' /></a>
	</div>

	<div class="col-12 ">
		<div class="row">
			<div class="col-12 offset-sm-3 col-sm-6 d-lg-none" >
				<canvas id="canvas" style="width: 100%;" class="canvas" width="500" height="500"></canvas>
				<script  src="http://tecnoplex.net/ruleta/js/index.js"></script>
			</div>
		</div>
	</div>
        
    <div class="col-12 ">
    	<button class="btn-block btn-success p-2">Reclama</button>
    </div>
</div>


 


<audio id="ruleraSound" src="http://tecnoplex.net/ruleta/ruleraSound.mp3" preload="none" class="d-none" controls></audio>


<script type="text/javascript">
	function play(){
		var ruleraSound=document.getElementById('ruleraSound');

		ruleraSound.play();
	}
</script>
@endsection









