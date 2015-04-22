<div class="nav">
	<a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a> <p>{{\Auth::user()->name}}</p> || <a href="{{ asset("dashboard") }}">Dashboard</a>
</div>