<div class="flex-container">
		@if($followers->count() > 0)
	        @foreach($followers as $user)
	        	<div class="card border-dark flex-item">
	                    <div class="card-body user-discover">
	                    	<img class="avatar-discover" src="{{ asset(avatar($user->avatar)) }}" alt="avatar">
	                        <strong class="link-discover">{{ $user->name }}
	                        <a href="{{ route('user.show', ['user' => $user->username]) }}">{{ '@'. $user->username }}</a></strong>
	                    </div>
	            </div>
	        @endforeach
		@else
			<h5>{{ '@'.$user->username }} não tem nenhum seguidor... Seja o primeiro!</h5>
		@endif
</div>