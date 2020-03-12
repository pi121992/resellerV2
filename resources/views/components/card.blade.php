@php
{{  $msg="";
    if($status=="Activo"){
      $msg="Esta cuenta esta activa si lo eliminas perderas el credito";
    }

    
}}
@endphp
<script>
function myFunction(title,id,msg) {
	
  var r=confirm(msg+"\nDeseas Eliminar a "+title+"?");
  if(r){
  	window.location="/MyUsers?delete="+id;
  }
}
</script>
<div class="card" style="width: 100%;">
  
  <div class="card-body">
  	<i class="fas fa-user-alt"></i>
    <h5 class="card-title">{{ $title }}</h5>
    <div class="font-weight-bold">
    		
    		 <nav>{{ $email }}</nav>
    	</div>
    <p class="card-text">

    	
    	<div>
    		<i class="fas fa-calendar-day"></i>
    		 <nav class="text-danger">{{ $date}}</nav>
         <nav class="text-danger">{{ $status}}</nav>
    	</div>
    	
    </p>

    @if (isset($btn))
        
   @else
    <a href="/MyUsers/{{ $id }}" class="btn btn-primary"><i class="fas fa-users-cog"></i> <label class="font-weight-bold"> Editar</label></a>

    <button class="btn btn-danger" onclick="myFunction('{{ $title }}','{{ $id }}','{{ $msg }}')"><i class="fas fa-trash-alt"></i> <label class="font-weight-bold">Eliminar</label></button>
    @endif
  </div>
</div>