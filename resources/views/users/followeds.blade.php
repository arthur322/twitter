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
                    <li class="list-group-item">
                        <form method="POST" action="{{ route('user.unfollow', $user->id) }}">
                            @csrf
                            <button type="submit" id="btn-unfollow" class="btn btn-primary">Já seguindo {{ $user->username }}</button>
                        </form>
                    </li>
                @elseif($user->id == Auth::user()->id)
                    <li class="list-group-item"><a href="#" class="btn btn-primary">Editar perfil</a>
                @else
                    <li class="list-group-item">
                        <form method="POST" action="{{ route('user.follow', $user->id) }}">
                            @csrf
                            <button type="submit" id="btn-follow" class="btn btn-primary">Seguir {{ $user->username }}</button>
                        </form>
                    </li>
                @endif
                    <li class="list-group-item">Tweets: {{ $user->tweets->count() }}</li>
                    <li class="list-group-item"><a href="{{ route('user.followers', $user->username) }}">Seguidores: {{ $user->followers->count() }}</a></li>
                    <li class="list-group-item"><a href="{{ route('user.followeds', $user->username) }}">Seguindo: {{ $user->followeds->count() }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <h3>Quem {{ '@'.$user->username }} está seguindo</h3>
			@include('users.follows._followeds')
        </div>
	</div>


@endsection