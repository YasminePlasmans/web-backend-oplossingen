@extends('app')
@section('content')

	@include('todos._nav')
	
	
	<h1>Edit: {!! $todos->title !!}</h1>

	{!! Form::model($todos, ['method' => 'PATCH', 'action' => ['TodosController@update', $todos->id ]]) !!}

		@include('todos._form', ['submitButtonText' => 'Update your task'])

	{!! Form::close() !!}

	@include('errors.list')
	
@stop