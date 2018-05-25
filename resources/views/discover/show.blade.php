@extends('layouts.app')

@section('content')


	<div class="row justify-content-md-center">
        <div class="col-md-6 container">
            @foreach($users as $user)
	        	<div class="card border-dark flex-item">
	                    <div class="card-body user-discover">
	                    	<img class="avatar-discover" src="{{ asset(avatar($user->avatar)) }}" alt="avatar">
	                        <strong>{{ $user->name }}</strong>
	                        <a href="{{ route('user.show', ['user' => $user->username]) }}">
	                             | {{ '@'. $user->username }}</a>
	                    </div>
	            </div>
            @endforeach
        </div>
        <div class="col-md-5">
			@include('tweets.show')
        </div>
	</div>


@endsection