<!-- create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> CRUD </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div class="container">
    <h2>new task</h2><br/>
    <form method="post" action="{{url('tasks')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-4">
                <label for="Name">Task Name:</label>
                <input type="text" class="form-control" name="name">
                <br>
                <label for="Name">Task Period:</label>
                <input type="text" class="form-control" name="period" placeholder="ex: 24 hour">
                <br>
                <label for="Name">Task Description:</label>
                <textarea class="form-control" name="description" style="height: 200px"></textarea>
                <br>
                <label for="Name">Task Finish Date:</label>
                <input type="datetime-local"  class="form-control" name="task_end_time" ></inputDate>
                <br>

                <label for="avatar" class="col-md-4 ">{{ __('Avatar (optional)') }}</label>

                <div class="col-md-6">
                    <input id="avatar" type="file" class="form-control" name="avatar">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-4" style="margin-top:10px">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>