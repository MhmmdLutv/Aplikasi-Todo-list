@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">TODO</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 form-group">
                            <form action="/todo" method="post" class="form-group">
                                {{ csrf_field() }}
                                <input type="text" name="todo" class="form-control" placeholder="Create a new todo">
                                <button type="submit" class="btn btn-light form-control">Create</button>
                            </form>
                        </div>
                    </div>
                    @foreach ($todos as $todo)
                        <table class="table table-bordered">
                            <tr>
                                <th width=680>{{$todo->todo}}</th>
                                @if ($todo->completed == 0)
                                    <th width=100>
                                        <a href="/todo/{{$todo->id}}/edit" class="btn btn-primary">Update</a>
                                    </th>
                                @endif
                                <th width=100>
                                    <form action="/todo/{{$todo->id}}" method="post">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </th>
                                <th width=170>
                                    @if ($todo->completed == 0)
                                        <a href="/todo/completed/{{$todo->id}}" class="btn btn-success">Mark As Complete</a>
                                    @else
                                        <span class="text-success">Completed!</span>
                                    @endif
                                </th>
                            </tr>
                        </table>                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
