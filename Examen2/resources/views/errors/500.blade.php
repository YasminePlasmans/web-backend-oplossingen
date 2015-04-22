@extends('app')

@section('content')



	<h1>This task could not be found</h1>

	<div class="picture">
		<img src="{{asset("images/sad-bunny.jpg")}}" alt="Sad bunny">
	</div>
	<div>
		<a href="{{ asset("/") }}" class="newTask btn btn-primary form-control">Go back</a>
	</div>
@stop