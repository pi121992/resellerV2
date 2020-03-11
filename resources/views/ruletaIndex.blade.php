
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


	<meta name="csrf-token" content="{{ csrf_token() }}" />
   


	<div class="row text-center">
        <div class="col-12 d-md-none">
        	<div id="dataR"></div>
        </div>
		<div class="col-12 d-md-none">
			<input type="button" class="btn-block btn-primary text-uppercase p-2 mt-3" value="Girar" id='Girar' />

			<a href="go:ruleta"> <input type="button" class="btn-block btn-warning text-uppercase p-2 mt-3" value="Otra vez" style="float:center;" id='intento' /></a>
		</div>

		<div class="col-12 ">
			<div class="row">
				<div class="col-12 d-md-none" >
					<canvas id="canvas" style="width: 100%;" class="canvas" width="500" height="500"></canvas>
				</div>
			</div>
			
			<script  src="http://tecnoplex.net/ruleta/js/index.js"></script>
		</div>
        
        <div class="col-12 d-md-none">
        	<input type="button" class="btn-block" value="Reclamar Premio" style="width: 60%; left: 20%;padding: 10px;border-radius: 5px; border-color: red; position: absolute; top: 88%; display: flex; justify-content: center; z-index: 10;" />
        </div>
	</div>


 


<audio id="ruleraSound" src="http://tecnoplex.net/ruleta/ruleraSound.mp3" preload="none" class="d-none" controls></audio>


<script type="text/javascript">
	function play(){
		var ruleraSound=document.getElementById('ruleraSound');

		ruleraSound.play();
	}
</script>






