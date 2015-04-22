<?php namespace App\Http\Controllers;

use App\Todos;
use App\User;
use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;

class TodosController extends Controller {

	public function __construct(){

		//$this->middleware('auth');
	
	}

	public function index(){

		\Auth::user();

		$todos = Todos::all();

		$tasksAmount = 0;
		
		foreach($todos as $todo){

			if ($todo->user_id == \Auth::user()->id) {
				$tasksAmount++;
			}
			
		}

		return view('todos.index')->with([
					
			'todos' => $todos,
			'tasksAmount' => $tasksAmount
			
			]);
	}

	public function show($id){

		$todos = Todos::findOrFail($id);

		$users = User::where( 'id' ,  '='  , $todos->user_id )->firstOrFail();

		return view('todos.show')->with([

			'todos' => $todos,
			'users' => $users

			]);
	}

	public function create(){
		
		return view('todos.create');

	}

	public function store(TaskRequest $request){

		$task = new Todos($request->all());

		\Auth::user()->todos()->save($task);

		return redirect('dashboard');

	}

	public function editRedirect($id){

		return redirect('dashboard/{{$id}}/edit');
	
	}

	public function edit($id){

		$todos = Todos::findOrFail($id);

		return view('todos.edit')->with('todos',$todos);
	
	}

	public function update($id, TaskRequest $request){

		$todo = Todos::findOrFail($id);

		$todo_user_id = $todo->user_id;

    	$user = \Auth::user();

    	if ($todo_user_id === $user->id) {

			$todo->update($request->all());
		
		}
		
		return redirect('dashboard');
	
	}

	public function delete($id){

		$todo = Todos::findOrFail($id);

		$todo_user_id = $todo->user_id;

    	$user = \Auth::user();

    	if ($todo_user_id === $user->id) {

			Todos::destroy($id);
		
		}
		
		return redirect('dashboard');

	}

	public function toggle($id){

		$todo = Todos::findOrFail($id);
		
		if($todo->done == true){

			$todo->done = false;
		
		}
		else{
			
			$todo->done = true;
		
		}
		

		$todo->save();

		return redirect('dashboard');
	}
}
