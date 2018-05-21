@extends('layouts.app')

@section('content')


	<div class="row justify-content-md-center">
        <div class="col-md-2">
            <div class="card border-dark">
                <img src="{{ asset(avatar($user->avatar)) }}" alt="avatar" class="card-img-top">
                <div class="card-header" style="padding: 0">
                    <div class="card-body">
                        <strong>{{ $user->name }}</strong>
                        <p class="card-text">{{ '@'. $user->username }}</p>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                @if(!Auth::check())
                    
                @elseif($user->followers->contains('id', Auth::user()->id))
                    <li class="list-group-item"><a href="#" id="btn-seguir" class="btn btn-primary disabled">Já seguindo {{ $user->username }}</a></li>
                @elseif($user->id == Auth::user()->id)
                    <li class="list-group-item"><a href="#" class="btn btn-primary">Editar perfil</a>
                @else
                    <li class="list-group-item"><a href="#" id="btn-seguir" class="btn btn-primary">Seguir {{ $user->username }}</a></li>
                @endif
                    <li class="list-group-item">Tweets: {{ $user->tweets->count() }}</li>
                    <li class="list-group-item">Seguidores: {{ $user->followers->count() }}</li>
                    <li class="list-group-item">Seguindo: {{ $user->followeds->count() }}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
			@include('tweets.show')
        </div>
	</div>


@endsection