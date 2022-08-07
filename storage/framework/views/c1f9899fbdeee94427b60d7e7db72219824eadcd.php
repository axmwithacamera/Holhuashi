<?php $__env->startSection('content'); ?>

<h3 class="text-center">Timeline</h3>

	<div class="row mx-auto" style="width: 1000px;">
	    <div class="col-lg-12">
        <form class="form-vertical" role="form" method="post" action="<?php echo e(route('status.post')); ?>">

<div class="form-group <?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
    <textarea<?php echo e($errors->count() ? '': ' autofocus'); ?> <?php echo e($errors->has('status') ? ' autofocus' : ''); ?> placeholder="What's up, <?php echo e(Auth::user()->getFullnameOrUsername()); ?>?" name="status" class="form-control" id="status" value="<?php echo e(old('status')); ?>"></textarea>
    <?php if($errors->has('status')): ?>
        <span class="help-block"><?php echo e($errors->first('status')); ?></span>
    <?php endif; ?>
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-secondary btn-sm ">Update status</button>
</div>

<input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">

</form>
	    </div>
	</div>
<hr>
	<div class="row mx-auto" style="width: 1000px;">
	    <div class="col-lg-12">
        <?php if(!$statuses->count()): ?>
	<p>There is nothing in this timeline, yet.</p>
<?php else: ?>
	<?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div class="card" style="width: 980px;">
  <div class="card-body">
		
		<div class="media">
		    <a class="pull-left" href="<?php echo e(route('profile.index', ['user_name' => $status->user->user_name])); ?>">
		        <img class="media-object" alt="<?php echo e($status->user->getNameOrUsername()); ?>" src="<?php echo e($status->user->getAvatarUrl()); ?>">
		    </a>
		    <div class="media-body">
		        <h4 class="media-heading"><a href="<?php echo e(route('profile.index', ['user_name' => $status->user->user_name])); ?>"><?php echo e($status->user->getNameOrUsername()); ?></a></h4>
		        <h5><?php echo e($status->body); ?></h5>
		        <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><?php echo e($status->created_at->diffForHumans()); ?></li>
                    <?php if( $status->user_id !== Auth::user()->id ): ?>
                    <li class="list-group-item"><a href="<?php echo e(route('status.like', $status->id)); ?>">Like</a></li>
	            	<?php endif; ?>
		            <li class="list-group-item"><span class="badge bg-danger rounded-pill">10</span> likes</li>
		        </ul>
                </div>
</div>
<?php $__currentLoopData = $status->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <hr>
                    <div class="media ps-5">
			            <a class="pull-left" href="<?php echo e(route('profile.index', ['user_name' => $reply->user->user_name])); ?>">
			                <img class="media-object" alt="<?php echo e($reply->user->getNameOrUsername()); ?>" src="<?php echo e($reply->user->getAvatarUrl()); ?>">
			            </a>
			            <div class="media-body">
			                <h5 class="media-heading"><a href="<?php echo e(route('profile.index', ['user_name' => $reply->user->user_name])); ?>"><?php echo e($reply->user->getNameOrUsername()); ?></a></h5>
			                <p><?php echo e($reply->body); ?></p>
			                <ul class="list-group list-group-horizontal">
			                    <li class="list-group-item"><?php echo e($reply->created_at->diffForHumans()); ?>.</li>
			                    <?php if( $reply->user_id !== Auth::user()->id ): ?>
			                    	<li class="list-group-item"><a href="<?php echo e(route('status.like', $reply->id)); ?>">Like</a></li>
			                    <?php endif; ?>
			                    <li class="list-group-item"><span class="badge bg-danger rounded-pill">4</span> likes</li>
			                </ul>
			            </div>
			        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br>
		        <!-- show input textarea to reply to this status -->
                <form role="form" action="<?php echo e(route('status.reply', $status->id)); ?>" method="post">
			            <div class="form-group<?php echo e($errors->has('reply-'.$status->id) ? ' has-error' : ''); ?>">
			                <textarea name="reply-<?php echo e($status->id); ?>" class="form-control" rows="2" 
		                	 	 placeholder="Reply to this status"></textarea>
			                <?php if($errors->has('reply-'.$status->id)): ?>
			                	<span class="help-block"><?php echo e($errors->first('reply-'.$status->id)); ?></span>
			                <?php endif; ?>
							<br>
			            </div>
                        
			            <input type="submit" value="Reply" class="btn btn-secondary btn-sm">
			            <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
			        </form>

		    </div>
		</div>
		<br>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
	    </div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Holhuashi/resources/views/timeline/index.blade.php ENDPATH**/ ?>