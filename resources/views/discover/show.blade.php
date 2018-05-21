@extends('layouts.app')

@section('content')


	<div class="row justify-content-md-center">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-7">
			@include('tweets.show')
        </div>
	</div>


@endsection