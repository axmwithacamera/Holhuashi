<div class="media">
  <a class="pull-left" href="<?php echo e(route('profile.index', ['user_name' => $user->user_name])); ?>">
    <img class="media-object"  alt="<?php echo e($user->getNameOrUsername()); ?>" src="<?php echo e($user->getAvatarUrl()); ?>">
  </a>
  <br>
  <div class="media-body">
    <h4 class="media-heading"><a href="<?php echo e(route('profile.index', ['user_name' => $user->user_name])); ?>"><?php echo e($user->getNameOrUsername()); ?></a></h4>
  </div>
</div><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Holhuashi/resources/views/user/partials/userblock.blade.php ENDPATH**/ ?>