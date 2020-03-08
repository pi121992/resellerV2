<?php $__env->startSection('body'); ?>
 <form method="post" action="/logout">
 	<?php echo csrf_field(); ?>
 	<input type="submit" name="" value="Salir">
 </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pitunti\Desktop\resellerV2\resources\views/welcome.blade.php ENDPATH**/ ?>