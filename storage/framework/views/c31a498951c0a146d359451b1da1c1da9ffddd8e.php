<?php
	{{@$state=$_GET['state'];}}
?>

<?php $__env->startSection('content'); ?>

<div class="alert-<?php echo e($deleteStatus ?? ''); ?>">
	<?php if(isset($deleteStatus) && $deleteStatus=="danger"): ?>
		Eliminastes a:<?php echo e($name); ?>

	<?php endif; ?>

	<?php if(isset($deleteStatus)=="info"): ?>
		Este usuario  No existe 
	<?php endif; ?>
</div>

	<?php $__env->startComponent('components.alert',['type'=>$state]); ?><?php echo $__env->renderComponent(); ?>
    <div class="row">
		<?php $__currentLoopData = $myUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_user =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <?php
		  	{{ if(strtotime($value->date)>strtotime(date('y-m-d'))){
		  		$status="Activo";
		  	}else{
		  		$status="Vencido";
		  	    }
		     }}
		  	
		  ?>
		  <div class="col-12 col-md-3 d-flex align-items-stretch">
		  	<?php $__env->startComponent('components.card',['title'=>$value->name,'email'=>$value->email,'id'=>$value->id,'status'=>$status,'date'=>date('d M Y',strtotime($value->date.' '))]); ?>
		  	<?php echo $__env->renderComponent(); ?>
		  </div>
		  
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pitunti\Desktop\resellerV2\resources\views/myUsers.blade.php ENDPATH**/ ?>