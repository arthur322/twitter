@extends('layouts.app')

@section('content')


	<div class="row justify-content-md-center">
        <div class="col-md-2">
            @foreach($users as $user)
	        	<div class="card border-dark">
	                <img src="{{ asset(avatar($user->avatar)) }}" alt="avatar" class="card-img-top">
	                <div class="card-header" style="padding: 0">
	                    <div class="card-body">
	                        <strong>{{ $user->name }}</strong>
	                        <p><a href="{{ route('user.show', ['user' => $user->username]) }}">
	                            {{ '@'. $user->username }}</a></p>
	                    </div>
	                </div>
	            </div>
            @endforeach
        </div>
        <div class="col-md-7">
			@include('tweets.show')
        </div>
	</div>


@endsection