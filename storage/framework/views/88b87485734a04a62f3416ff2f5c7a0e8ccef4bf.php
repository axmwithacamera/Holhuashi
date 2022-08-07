<?php $__env->startSection('content'); ?>
<h3>Search results for "<?php echo e(Request::input('query')); ?>"</h3>
<?php if(!$users->count()): ?>
<p>No results found, sorry!</p>
<?php else: ?>
    <div class="row">
        <div class="col-lg-12">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('user/partials/userblock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Holhuashi/resources/views/search/results.blade.php ENDPATH**/ ?>