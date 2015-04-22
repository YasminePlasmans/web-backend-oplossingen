@extends('app')
{{--*/  $counterDone = 0 /*--}}
{{--*/ $counterNotdone = 0 /*--}}
@section('content')

	@include('todos._nav')
	
	<h1>List of tasks</h1>
	
	<div class="todos">

		@if($tasksAmount == 0)
			
			<h3>Add some tasks to get started.</h3>
		
		@else
			
			<h2>Still to-do</h2>	
			
			@foreach ($todos as $todo)
		
				@if ($todo->done == false && $todo->user_id == \Auth::user()->id)
					
					<div class="todo">
		
						<a href="{{ action('TodosController@toggle', [$todo->id]) }}"><i class="fa fa-check"></i></a>
						<p>{{ $todo->title }}</p></a>
						<a href="{{ action('TodosController@delete', [$todo->id]) }}"><i class="fa fa-times"></i>
						<a href="{{ action('TodosController@edit', [$todo->id]) }}"><i class="fa fa-pencil-square-o"></i></a>
	
					</div>
					{{--*/ $counterDone = 1 /*--}}
				@endif
	
			@endforeach
			
			@if(!$counterDone)
				<p>Add some more work please</p>
			@endif
	
			<h2>Done</h2>
			
			@foreach ($todos as $todo)
		
				@if ($todo->done == true && $todo->user_id == \Auth::user()->id)
		
					<div class="todo">
	
						<a href="{{ action('TodosController@toggle', [$todo->id]) }}"><i class="fa fa-check"></i></a>
						<p>{{ $todo->title }}</p>
						<a href="{{ action('TodosController@delete', [$todo->id]) }}"><i class="fa fa-times"></i></a>
						<a href="{{ action('TodosController@edit', [$todo->id]) }}"><i class="fa fa-pencil-square-o"></i></a>
	
					</div>
					{{--*/ $counterNotdone = 1 /*--}}
				@endif
		
			@endforeach
	
			@if(!$counterNotdone)
				<p>All done! Nice work.</p>
			
			@endif
		
		@endif
		
		<a href="{{ action('TodosController@create') }}" class="newTask btn btn-primary form-control">Add a new task</a>

	</div>

@stop