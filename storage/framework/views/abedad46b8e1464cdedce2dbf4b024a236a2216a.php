<?php $__env->startSection('content'); ?>

<?php if(isset($_GET['msg']) && isset($_GET['type']) ): ?>
    <?php $__env->startComponent('components.alertEdit',['type'=>$_GET['type']]); ?>
        <?php echo e(strtoupper ($_GET['msg'])); ?>

    <?php echo $__env->renderComponent(); ?>

    
<?php endif; ?>

<form method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="email">Emai:</label>
        <input id="email" class="form-control" type="email"" name="emailDemo" placeholder="Email demo plex">
    </div>
    <button type="submit" class="btn btn-primary"> Enviar demo</button>
    
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

       
       <div class="row font-weight-bold text-white align-content-center text-center mt-4">
           <div class="col-12 col-md-4 bg-warning text-muted">Demos:No estas  Registrado:1</div>
           <div class="col-12 col-md-4 bg-info">Demos:si estasRegistrado:2</div>
           <div class="col-12 col-md-4 bg-success">Demos:si estas Registrado y con creditos:El doble de lo que tengas en creditos</div>
       </div>

       <div class="row">
            <div class="col-12 text-center">
                <h1>Mis Demos:</h1>
            </div>
       </div>

       <div class="row">
                <?php $__currentLoopData = $myUsersDemo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <?php $__env->startComponent(
                            'components.card',
                            ['title'=>$user->email,
                            'email'=>'',
                            'id'=>'',
                            'status'=>'',
                            'btn'=>'',
                            'date'=>$user->date]
                            ); ?>
                        <?php echo $__env->renderComponent(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
       </div>
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appHome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\pitunti\Desktop\resellerV2\resources\views/demo.blade.php ENDPATH**/ ?>