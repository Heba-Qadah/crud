<!-- edit.blade.php -->
@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel CRUD - EDIT </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <h2>Update Tasks</h2><br  />
    <form method="post" action="{{action('TasksController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-4">
                <label for="name">Name of Task:</label>
                <input type="text" class="form-control" name="name" value="{{$tasks->name}}">
                <br>
            </div>
            <div class="form-group col-md-4">
                <label for="period">Period of Task:</label>
                <input type="text" class="form-control" name="period" value="{{$tasks->period}}">
                <br>
            </div>


            <div class="form-group col-md-4">
                <label for="description">Description of Task:</label>
                <input type="text" class="form-control" name="description" value="{{$tasks->description}}">
                <br>
            </div>


            <div class="form-group col-md-4">
                <label for="task_end_time">Task Finish Date:</label>
                <input type="datetime-local" class="form-control" name="task_end_time" value="{{$tasks->task_end_time}}">
                <br>
            </div>


            <label for="avatar" class="col-md-4 ">{{ __('Avatar (optional)') }}</label>

            <div class="col-md-6">
                <input id="avatar" type="file" class="form-control" name="avatar">
            </div>

        </div>
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12" style="margin-top:10px">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route('tasks.index') }}" style="align-self: right "> Back</a>
    </form>
</div>
</body>
</html>