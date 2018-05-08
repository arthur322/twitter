@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-2">
            <div class="card border-dark">
                <img src="{{ asset('storage/avatars/avatar.png') }}" alt="avatar" class="card-img-top">
                <div class="card-header">
                    <div class="card-body">
                        <strong>{{ Auth::user()->name }}</strong>
                        {{ '@'. Auth::user()->username }}
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
                            <button type="submit" class="btn btn-primary" style="float: right; width: 150px">Tweetar</button>
                        </form>
                    </div>
                </div>
                
            </div>
            {{-- Tweets --}}
            @include('tweets.show')
        </div>
    </div>
</div>
@endsection
