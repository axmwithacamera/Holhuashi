<div class="media">
  <a class="pull-left" href="{{ route('profile.index', ['user_name' => $user->user_name]) }}">
    <img class="media-object"  alt="{{ $user->getNameOrUsername() }}" src="{{ $user->getAvatarUrl() }}">
  </a>
  <br>
  <div class="media-body">
    <h4 class="media-heading"><a href="{{ route('profile.index', ['user_name' => $user->user_name]) }}">{{ $user->getNameOrUsername() }}</a></h4>
  </div>
</div>