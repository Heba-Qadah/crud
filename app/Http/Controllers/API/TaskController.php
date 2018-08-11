<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Controllers\API\BaseController as BaseController;
use auth;
use App\Task;
use Validator ;

class TaskController extends BaseController
{


public function index()
{
    $tasks = Task::all();
    return $this->sendResponse($tasks->toArray(), 'Tasks read successfully');
}
public function store(Request $request)
{

     $validator = $request->validate([
    'name'=> 'required',
    'period' => 'required',
    'description' => 'required',
    'task_end_time' => 'required',
            ]);

    $tasks = new Task();
    $tasks->name = $request->get('name');
    $tasks->period = $request->get('period');
    $tasks->description = $request->get('description');
    $tasks->task_end_time = $request->get('task_end_time');
    $tasks->user_id = auth::user()->id;
    //$tasks->addMedia($request->avatar)->toMediaCollection('avatar');


    /*if ($validator -> fails()) {
        return $this->sendError('error validation', $validator->errors());
    }*/

    $tasks->save();
    return new TaskResource($tasks);

   // return $this->sendResponse($tasks->toArray(), 'Task  created succesfully');
}
public function show($id)
{
    $task = Task::find($id);

    if (   is_null($task)   ) {

        return $this->sendError(  'Task not found ! ');
    }
    //return $this->sendResponse($task->toArray(), 'task read succesfully');
    return new TaskResource($task);


}
// update task
public function update(Request $request , Task $task)
{
    $input = $request->all();

    //$task = Task::find($id);

     $validator = $request->validate([
    'name'=> 'required',
    'period' => 'required',
    'description' => 'required',
    'task_end_time' => 'required',
            ]);

    if ($validator -> fails()) {

        return $this->sendError('error validation', $validator->errors());
    }

    $task->name =  $input['name'];
    $task->period =  $input['period'];
    $task->description =  $input['description'];
    $task->task_end_time =  $input['task_end_time'];

    $task->save();
    return $this->sendResponse($task->toArray(), 'task  updated succesfully');

}
// delete task
public function destroy(Task $task)
{
    $task->delete();
    return $this->sendResponse($task->toArray(), 'task  deleted successfully');
}

}
