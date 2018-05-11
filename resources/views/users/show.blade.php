@extends('layouts.app')

@section('content')


	<div class="row justify-content-md-center">
        <div class="col-md-2">
            <div class="card border-dark">
                <img src="{{ asset('storage/avatars/'.Auth::user()->username.'.jpg) }}" alt="avatar" class="card-img-top">
                <div class="card-header" style="padding: 0">
                    <div class="card-body">
                        <strong>{{ Auth::user()->name }}</strong>
                        <p>{{ '@'. Auth::user()->username }}</p>
                    </div>
                    <div class="card-footer">
                    	<strong>Nome</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
        	<div class="card border-dark">
				<div class="card-body">
					
				</div>
        	</div>
        </div>
	</div>


@endsection