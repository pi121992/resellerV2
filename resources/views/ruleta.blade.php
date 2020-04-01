@extends('layout.ruletaPlantilla')
@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row text-center">

	<div class="col-12 d-lg-none">
    	<div id="dataR" class="alert-secondary p-2 font-weight-bold text-muted text-center"></div>
    </div>

    <div class="col-12 d-lg-none">
		<input type="button" class="btn-block btn-primary font-weight-bold text-white p-2 mt-3" value="Girar y Ganar!!" id='Girar' />


       <div id='intento' class="row">
           <div class="col-6">
           	  <a href="go:ruleta"> <input type="button" class="btn-block btn-warning font-weight-bold text-white p-2 mt-3" value="Jugar otra vez" style="float:center;"  /></a>
          </div>

          <div class="col-6 btn-block btn-success  p-2 mt-3 ">
          	  

          	  <a href="go:reclama" class="text-decoration-none font-weight-bold text-white">Reclamar Horas</a>
          </div>
       	  
       </div>
		
	</div>

	<div class="col-12 ">
		<div class="row">
			<div class="col-12 offset-sm-3 col-sm-6 d-lg-none" >
				<canvas id="canvas" style="width: 100%;" class="canvas" width="500" height="500"></canvas>
				<script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>
				
			</div>
		</div>
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









