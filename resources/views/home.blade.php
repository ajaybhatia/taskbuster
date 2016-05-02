@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach($tasks as $task)
            <div class="panel panel-default">
                <div id="{{ $task->id }}" class="panel-heading">
                    {{ $task->name }}
                    <button type="button" class="close" data-target="{{ $task->id }}" data-dismiss="alert" data-token="{{ csrf_token() }}">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only">Close</span>
                    </button>
                </div>

                <div class="panel-body">
                    {{ $task->description }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
