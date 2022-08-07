@extends ('layouts.app')

@section('content')

<h3 class="text-center">Timeline</h3>

	<div class="row mx-auto" style="width: 1000px;">
	    <div class="col-lg-12">
        <form class="form-vertical" role="form" method="post" action="{{ route('status.post') }}">

<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
    <textarea{{ $errors->count() ? '': ' autofocus' }} {{ $errors->has('status') ? ' autofocus' : '' }} placeholder="What's up, {{ Auth::user()->getFullnameOrUsername() }}?" name="status" class="form-control" id="status" value="{{ old('status') }}"></textarea>
    @if ($errors->has('status'))
        <span class="help-block">{{ $errors->first('status') }}</span>
    @endif
</div>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-secondary btn-sm ">Update status</button>
</div>

<input type="hidden" name="_token" value="{{ Session::token() }}">

</form>
	    </div>
	</div>
<hr>
	<div class="row mx-auto" style="width: 1000px;">
	    <div class="col-lg-12">
        @if (!$statuses->count())
	<p>There is nothing in this timeline, yet.</p>
@else
	@foreach ($statuses as $status)
    
    <div class="card" style="width: 980px;">
  <div class="card-body">
		
		<div class="media">
		    <a class="pull-left" href="{{ route('profile.index', ['user_name' => $status->user->user_name]) }}">
		        <img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user->getAvatarUrl() }}">
		    </a>
		    <div class="media-body">
		        <h4 class="media-heading"><a href="{{ route('profile.index', ['user_name' => $status->user->user_name]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
		        <h5>{{ $status->body }}</h5>
		        <ul class="list-group list-group-horizontal">
                    <li class="list-group-item">{{ $status->created_at->diffForHumans() }}</li>
                    @if ( $status->user_id !== Auth::user()->id )
                    <li class="list-group-item"><a href="{{ route('status.like', $status->id) }}">Like</a></li>
	            	@endif
		            <li class="list-group-item"><span class="badge bg-danger rounded-pill">10</span> likes</li>
		        </ul>
                </div>
</div>
@foreach ($status->replies as $reply)
                  <hr>
                    <div class="media ps-5">
			            <a class="pull-left" href="{{ route('profile.index', ['user_name' => $reply->user->user_name]) }}">
			                <img class="media-object" alt="{{ $reply->user->getNameOrUsername() }}" src="{{ $reply->user->getAvatarUrl() }}">
			            </a>
			            <div class="media-body">
			                <h5 class="media-heading"><a href="{{ route('profile.index', ['user_name' => $reply->user->user_name]) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
			                <p>{{ $reply->body }}</p>
			                <ul class="list-group list-group-horizontal">
			                    <li class="list-group-item">{{ $reply->created_at->diffForHumans() }}.</li>
			                    @if ( $reply->user_id !== Auth::user()->id )
			                    	<li class="list-group-item"><a href="{{ route('status.like', $reply->id) }}">Like</a></li>
			                    @endif
			                    <li class="list-group-item"><span class="badge bg-danger rounded-pill">4</span> likes</li>
			                </ul>
			            </div>
			        </div>
@endforeach
<br>
		        <!-- show input textarea to reply to this status -->
                <form role="form" action="{{ route('status.reply', $status->id) }}" method="post">
			            <div class="form-group{{ $errors->has('reply-'.$status->id) ? ' has-error' : '' }}">
			                <textarea name="reply-{{ $status->id }}" class="form-control" rows="2" 
		                	 	 placeholder="Reply to this status"></textarea>
			                @if ($errors->has('reply-'.$status->id))
			                	<span class="help-block">{{ $errors->first('reply-'.$status->id) }}</span>
			                @endif
							<br>
			            </div>
                        
			            <input type="submit" value="Reply" class="btn btn-secondary btn-sm">
			            <input type="hidden" name="_token" value="{{ Session::token() }}">
			        </form>

		    </div>
		</div>
		<br>
	@endforeach

@endif
	    </div>
	</div>

@endsection