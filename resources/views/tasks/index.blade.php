@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Tasks</div>
                <div class="panel-body">
                    @foreach($tasks as $task)
                        <li>{{ $task->title }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
