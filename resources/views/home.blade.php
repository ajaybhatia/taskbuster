@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- add task -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Add a Task
                </div>

                <div class="panel-body">
                    <form action="{{ url('create') }}" method="POST" role="form">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Task Title">
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Task Description"></textarea>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Add Task
                        </button>
                    </form>
                </div>
            </div>
            <!-- add task -->

            <!-- display task(s) -->
            @foreach($tasks as $task)
            <div class="panel panel-default">
                <div id="{{ $task->id }}" class="panel-heading">
                    {{ $task->name }}
                    <button type="button" class="close" data-target="{{ $task->id }}" data-dismiss="alert" data-token="{{ csrf_token() }}"  >
                        <span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only">Close</span>
                    </button>
                </div>

                <div class="panel-body">
                    {{ $task->description }}
                </div>
            </div>
            @endforeach
            <!-- display task(s) -->
        </div>
    </div>
</div>
@endsection
