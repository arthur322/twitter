@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-2">
            <div class="card border-dark">
                <img src="{{ asset(avatar(Auth::user()->avatar)) }}" alt="avatar" class="card-img-top">
                <div class="card-header" style="padding: 0">
                    <div class="card-body">
                        <strong>{{ Auth::user()->name }}</strong>
                        <p><a href="{{ route('user.show', ['user' => Auth::user()->username]) }}">
                            {{ '@'. Auth::user()->username }}</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card border-dark">

                {{-- Card de status ou sucesso --}}
                    @if (session('status'))
                        <div class="card-body">
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="card-body">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif     

                    

                {{-- Tweetar --}}
                <div class="card-header">
                    <div class="card-body">
                        <form method="POST" action="{{ route('tweet.store', Auth::user()->id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="content" rows="2" placeholder="Que que pega?" style="resize: none">{{ old('username') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button id="tweet-button" type="submit" class="btn btn-primary" style="float: right; width: 100%; display: none">Tweetar</button>
                        </form>
                    </div>
                </div>
                
            </div>
            {{-- Tweets --}}
            @include('tweets.show')
        </div>
    </div>
@endsection
