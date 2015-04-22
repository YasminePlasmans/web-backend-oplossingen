@extends('app')

@section('content')

	@include('todos._nav')
	
	<h1>Task: {!! $todos->title !!}</h1>
	<h3>By: {!! $users->name !!}</h3>

@stop