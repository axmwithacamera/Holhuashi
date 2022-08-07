<?php $__env->startSection('content'); ?>

    <div class="row mx-auto">
        <div class="col-lg-5">
            <?php echo $__env->make('user.partials.userblock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <hr>
        </div>

        <div class="col-lg-4 col-lg-offset-3">
            <h4>Friends of <?php echo e($user->getFullNameOrUsername()); ?></h4>
            <?php if(!$user->friends()->count()): ?>
            <p><?php echo e($user->getFullNameOrUsername()); ?> currently has no friends</p>
            <?php else: ?>
                <?php $__currentLoopData = $user->friends(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('user.partials.userblock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Holhuashi/resources/views/profile/index.blade.php ENDPATH**/ ?>