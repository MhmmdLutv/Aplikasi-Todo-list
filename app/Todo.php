<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = ['todo', 'completed', 'user_id'];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Will return all of the todo list with order by created_at in descending
    public function scopeget_all()
    {
        return Todo::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    }

    // Create a new todo
    public function scopestore($querry, $param = array())
    {
        return Todo::create([
            'todo' => $param['todo'],
            'user_id' => Auth::id()
        ]);
    }

    // Filter todo by id
    public function scopeget_id($querry, $id)
    {
        return Todo::where('user_id', Auth::id())->where('id', $id)->first();
    }

    // Update an existing todo
    public function scopeedit($querry, $id, $param = array())
    {
        $todo = Todo::where('user_id', Auth::id())->where('id', $id)->first();
        return $todo->update([
            'todo' => $param['todo']
        ]);
    }

    // Delete a todo by id
    public function scopedelete_id($querry, $id)
    {
        $todo = Todo::where('user_id', Auth::id())->where('id', $id)->first();
        $todo->delete();
    }

    // Update an existing todo to make it mark as completed
    public function scopeedit_to_complete($querry, $id)
    {
        $todo = Todo::where('user_id', Auth::id())->where('id', $id)->first();
        $todo->update([
            'completed' => 1
        ]);
    }
}
