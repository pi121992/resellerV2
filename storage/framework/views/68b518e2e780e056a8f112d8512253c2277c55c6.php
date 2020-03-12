<div class="alert alert-<?php echo e($type); ?>" role="alert">
  <?php if($type=="success"): ?>
  	Invitacion Enviada con exito
  <?php endif; ?>
  <?php if($type=="danger"): ?>
  	No tienes creditos
  <?php endif; ?>
  <?php if($type=="warning"): ?>
  	Email ya existe en el servidor
  <?php endif; ?>
  <?php if($type=="dark"): ?>
  	Email invalido
  <?php endif; ?>
</div><?php /**PATH C:\Users\pitunti\Desktop\resellerV2\resources\views/components/alert.blade.php ENDPATH**/ ?>