<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\facades\auth;
use App\Task;
//use Auth;
use App\User;
use App\Notifications\InvoicePaid;
use Notification;
//use Illuminate\Notifications\Notification;


class TasksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::latest()->paginate(10);
        return view('index',compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            // get current logged in user
            //$user = Auth::user();

            //if ($user->can('create', Task::class)) {
              return view('create');
             /* echo 'Current logged in user is allowed to create new tasks.';
            } else {
              echo 'Not Authorized';
            }
            exit;*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $tasks = new Task();
    $tasks->name = $request->get('name');
    $tasks->period = $request->get('period');
    $tasks->description = $request->get('description');
    $tasks->task_end_time = $request->get('task_end_time');
    $tasks->user_id = auth::user()->id;
    $tasks->addMedia($request->avatar)->toMediaCollection('avatar');

    $users = User::find($tasks->user_id);
    Notification::send($users, new InvoicePaid());

    $tasks->save();
    return redirect('tasks')->with('success','task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $tasks = Task::find($id);
        if($user->can('show', $tasks)){
            return view('show',compact('tasks'));
            echo "Current logged in user is allowed to update the task: {$tasks->id}";
            } else {
                  echo 'Not Authorized.';
                }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //if ($user->can('update', $task)) {
        $tasks = Task::find($id);
        return view('edit',compact('tasks','id'));
      //  }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     // get current logged in user
        $user = Auth::user();
     // load task
        $task = Task::find($id);

        if ($user->can('update', $task)) {
            $tasks= Task::find($id);
            $tasks->name=$request->get('name');
            $tasks->period = $request->get('period');
            $tasks->description = $request->get('description');
            $tasks->task_end_time = $request->get('task_end_time');
            $tasks->save();
            return redirect('tasks')->with('success','task has been updated');
          echo "Current logged in user is allowed to update the Task: {$tasks->id}";
        } else {
          echo 'Not Authorized.';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    // get current logged in user
        $user = Auth::user();

        // load task
        $task = Task::find($id);

        if ($user->can('delete', $task)) {
            $tasks = Task::find($id);
            $tasks->delete();
            return redirect('tasks')->with('success','Task Has Been Deleted');
            echo "Current logged in user is allowed to delete the
            task: {$task->id}";
            } else {
                echo 'Not Authorized.';
                }
    }
}
