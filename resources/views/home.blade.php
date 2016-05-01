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
                <div class="panel-heading">{{ $task->name }}</div>

                <div class="panel-body">
                    {{ $task->description }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
