@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Update Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.edit') }}">
                        @csrf
                        <div class="row mb-3">
                                <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ ('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ Request::old('user_name') ?: Auth::user()->user_name }}">

                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="full_name" class="col-md-4 col-form-label text-md-end">{{ ('Full Name') }}</label>

                                <div class="col-md-6">
                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ Request::old('full_name') ?: Auth::user()->full_name }}">

                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                          <input type="hidden" name="_token" value="{{ Session::token()}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@endsection