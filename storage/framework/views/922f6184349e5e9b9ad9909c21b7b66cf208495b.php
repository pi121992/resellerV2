<?php
{{  $msg="";
    if($status=="Activo"){
      $msg="Esta cuenta esta activa si lo eliminas perderas el credito";
    }

    
}}
?>
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
    <h5 class="card-title"><?php echo e($title); ?></h5>
    <div class="font-weight-bold">
    		
    		 <nav><?php echo e($email); ?></nav>
    	</div>
    <p class="card-text">

    	
    	<div>
    		<i class="fas fa-calendar-day"></i>
    		 <nav class="text-danger"><?php echo e($date); ?></nav>
         <nav class="text-danger"><?php echo e($status); ?></nav>
    	</div>
    	
    </p>

    <?php if(isset($btn)): ?>
        
   <?php else: ?>
    <a href="/MyUsers/<?php echo e($id); ?>" class="btn btn-primary"><i class="fas fa-users-cog"></i> <label class="font-weight-bold"> Editar</label></a>

    <button class="btn btn-danger" onclick="myFunction('<?php echo e($title); ?>','<?php echo e($id); ?>','<?php echo e($msg); ?>')"><i class="fas fa-trash-alt"></i> <label class="font-weight-bold">Eliminar</label></button>
    <?php endif; ?>
  </div>
</div><?php /**PATH C:\Users\pitunti\Desktop\resellerV2\resources\views/components/card.blade.php ENDPATH**/ ?>