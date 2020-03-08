<?php
	{{$editUser=$resultado[0];}}

?>


<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.alertEdit'); ?>
        <?php echo e($msg); ?>

    <?php echo $__env->renderComponent(); ?>
   <form method="POST" >
   	<?php echo csrf_field(); ?>
    <div class="form-group">
   		<label>Fecha de vencimiento:<br><?php echo e(date('d M Y',strtotime($editUser->date.' '))); ?></label>
   		
   	</div>

   	<div class="form-group">
   		<label>Nombre:</label>
   		<input type="text" class="form-control" name="name" value="<?php echo e($editUser->name); ?>" required>
   	</div>
   	<div class="form-group">
   		<label>Email:</label>
   		<input type="email" class="form-control" name="email" value="<?php echo e($editUser->email); ?>" required>
   	</div>

   	<div class="form-group">
   		<label>Notas:</label>
   		<input type="text" class="form-control" name="note" value="<?php echo e($editUser->coment); ?>" required>
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
		  <div class="row offset-3">
		  <?php for($i = 0; $i < count($library[1]); $i++): ?>
			  <?php
				$checked='checked';
				$color="info";
				$mayor="";
				if(strpos($library[2][$i],"xxx")){
				  $checked="";
				  $color="danger";
				  $mayor="Solo mayores de 18+";
				} 
			  ?>
			  <div class="col-12 col-md-3 mb-1 text-center ml-1 btn-<?php echo e($color); ?>">
			   <label class="btn ">
			   <input type="checkbox" name="library[]"<?php echo e($checked); ?> value="<?php echo e($library[1][$i]); ?>"><?php echo e($mayor); ?><br> <?php echo e($library[2][$i]); ?>

			   </label>
			  </div>
		   <?php endfor; ?>
		   </div>
	   </div>
   
  </div>
</div>

   </form> 
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pitunti\Desktop\resellerV2\resources\views/edit.blade.php ENDPATH**/ ?>