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
                            <form action="/todo/{{$todo->id}}" method="post" class="form-group">
                                {{ csrf_field() }}
                                @method('put')
                                <input type="text" name="todo" class="form-control" value="{{$todo->todo}}">
                                <button type="submit" class="btn btn-info form-control">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
