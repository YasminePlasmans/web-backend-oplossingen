@extends('app')

@section('content')

	@include('todos._nav')
	
	<h1>Add a new task</h1>

	{!! Form::open(['url' => 'dashboard']) !!}
	
		{!! Form::hidden('done', false ) !!}
		@include('todos._form', ['submitButtonText' => 'Add your task'])

	{!! Form::close() !!}

	@include('errors.list')

@stop