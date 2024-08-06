<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        $todos = Todo::get_all();

        return view('todo')->with('todos', $todos);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        // Todo::create([
        //     'todo' => $request->todo
        // ]);

        $param['todo'] = $request->todo;
        Todo::store($param);

        return redirect('todo')->with('success', 'Todo Created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // Filter todo by id
        $todo = Todo::get_id($id);

        return view('edit')->with('todo', $todo);
    }

    public function update(Request $request, $id)
    {
        $param['todo'] = $request->todo;
        Todo::edit($id, $param);

        return redirect('todo')->with('success', 'Todo Updated');
    }

    public function destroy($id)
    {
        Todo::delete_id($id);

        return redirect('todo')->with('alert', 'Todo Deleted');
    }

    public function completed($id)
    {
        Todo::edit_to_complete($id);

        return redirect('todo')->with('success', 'Todo Completed');
    }
}
