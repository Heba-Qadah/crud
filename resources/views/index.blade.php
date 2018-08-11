@extends('layouts.app')

<!-- index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>List of Tasks</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />

    <h1>
        Create Task
    </h1>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
    @endif
    <div>
        <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
    </div>
    <br>

    <h2>
        List of Tasks
    </h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Num</th>
            <th>id</th>
            <th>Task Name</th>
        </tr>
        </thead>
        <tbody>

        @foreach($tasks as $task)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$task['id']}}</td>
                <td>{{$task['name']}}</td>

                <td>
                    <form action="{{action('TasksController@destroy', $task['id'])}}" method="post">
                        @csrf

                        <a href="{{action('TasksController@show', $task['id'])}}" class="btn alert-success">Read</a>
                        <a href="{{action('TasksController@edit', $task['id'])}}" class="btn btn-warning">Edit</a>

                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ url('/') }}" style="align-self: right "> Back</a>

    {{ $tasks->links() }}

</div>
</body>
</html>