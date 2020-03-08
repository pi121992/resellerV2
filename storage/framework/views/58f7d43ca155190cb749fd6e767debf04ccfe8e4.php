<?php $__env->startSection('content'); ?>
   <div class="row">
     <div class="col-12 col-md-4">
       <?php $__env->startComponent('components.price',['title'=>'Basic','price'=>'$5']); ?>
       <li>1 credito</li>
         <li>Tu tienes el control de tu cuenta</li>
         <li>2 conecciones simultaneas</li>
         <li>Mas de 40TB de contenido</li>
         <li>Actualizaciones diarias</li>
       <?php echo $__env->renderComponent(); ?>
     </div>
     <div class="col-md-4">
       <?php $__env->startComponent('components.price',['title'=>'Premiun','price'=>'$17']); ?>
         <li>5 creditos</li>
         <li>Tu tienes el control de tu cuenta</li>
         <li>2 conecciones simultaneas</li>
         <li>Mas de 40TB de contenido</li>
         <li>Actualizaciones diarias</li>
       <?php echo $__env->renderComponent(); ?>
       </div>
       <div class="col-md-4">
       <?php $__env->startComponent('components.price',['title'=>'Advanced','price'=>'$40']); ?>
       <li>10 creditos</li>
       <li>Tu tienes el control de tu cuenta</li>
       <li>2 conecciones simultaneas</li>
       <li>Mas de 40TB de contenido</li>
       <li>Actualizaciones diarias</li>
     <?php echo $__env->renderComponent(); ?>
     </div>
   </div>


     

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pitunti\Desktop\resellerV2\resources\views/home.blade.php ENDPATH**/ ?>