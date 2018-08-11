<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Laravel CRUD - show </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br>
    <br>
    <h2>Read Task</h2><br  />
    <div class="row">
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <strong>ID of Task:</strong>
                {{ $tasks->id }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <strong>Name of Task:</strong>
                {{ $tasks->name }}

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <strong>Period that task will take:</strong>
                {{ $tasks->period }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <strong>Description of Task:</strong>
                {{ $tasks->description }}
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group col-md-4">
                <strong>Task Finish Date:</strong>
                {{ $tasks->task_end_time }}
            </div>
        </div>
        <br>
        <div >

            <div class="card-columns ml-5">
                <div class="card">
                    <img class="card-img-top " src="{{ $tasks->getMedia('avatar')->first()->getUrl('thumb') }}" alt="Card image cap">

                </div>
            </div>
            <a class="btn btn-primary ml-5" href="{{ route('tasks.index') }}" style="align-self: right "> Back</a>
    </div>
</div>
</body>
</html>