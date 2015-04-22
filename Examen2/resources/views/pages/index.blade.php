@extends('app')
@section('content')

	<h1>Log in or register</h1>

	<a href="{{ action('Auth\AuthController@getLogin') }}" class="newTask btn btn-primary form-control">Login</a>
	<a href="{{ action('Auth\AuthController@getRegister') }}" class="newTask btn btn-primary form-control">Register</a>

	@include('errors.list');

@stop