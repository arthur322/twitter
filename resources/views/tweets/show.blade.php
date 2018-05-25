@foreach($tweets as $tweet)
	<div class="card border-dark tweets">
		<div class="card-header" style="padding-left: 20px">
			<img src="{{ asset(avatar($tweet->user->avatar)) }}" alt="avatar" class="img-fluid" style="width: 7%; float: left">
			<ul style="float: left;list-style-type: none; margin-left: -20px; margin-top: -4px; margin-bottom: -5px">
				<li><strong>{{ $tweet->user->name }}</strong></li>
				<li><a href="{{ route('user.show', ['user' => $tweet->user->username]) }}">{{ '@'.$tweet->user->username }}</a>
				 - {{ $tweet->created_at->diffForHumans(null, false, true) }}</li>
			</ul>
		</div>
		<div class="card-body">
			{{ $tweet->content }}
		</div>
	</div>
@endforeach