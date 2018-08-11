<?php

namespace App\Console\Commands;
use App\Task;
use App\User;
use Illuminate\Console\Command;
use DateTime;
use Auth;
use App\Notifications\Notifay;
use Notification;
use DateTimeZone;
use Date;
use DB;
use Carbon\Carbon;
class TaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'finished:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send an email when task finished';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       /* $tests = DB::table('tasks')
                  ->select('user_id')
                  ->where('task_end_time' ,'=' , Carbon::today()->format('Y-m-d'))
                  ->get();*/

        $tasks=Task::whereDate('task_end_time','=',date('Y-m-d'))->get();
        //dd($tasks);
        foreach($tasks as $task){
                 $users = User::find($task->user_id);
                 Notification::send($users, new Notifay());
        }
    }
}
