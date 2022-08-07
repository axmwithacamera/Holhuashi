@extends('layouts.app')
@section('content')

    <div class="row mx-auto">
        <div class="col-lg-5">
            @include('user.partials.userblock')
            <hr>
        </div>

        <div class="col-lg-4 col-lg-offset-3">
            <h4>Friends of {{ $user->getFullNameOrUsername()}}</h4>
            @if(!$user->friends()->count())
            <p>{{ $user->getFullNameOrUsername()}} currently has no friends</p>
            @else
                @foreach($user->friends() as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif

        </div>
    </div>

@endsection