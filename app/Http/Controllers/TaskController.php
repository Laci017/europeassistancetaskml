<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Priority;
use App\Models\Responsible;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public $data;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->data = new \stdClass();
    }

    public function create()
    {
        $this->data->statuses = Status::get();
        $this->data->priorities = Priority::get();
        $this->data->users = User::get();
        return view('task.create')->with('data', $this->data);
    }

    public function update(Task $task)
    {
        $this->model = $task;
        $this->data->statuses = Status::get();
        $this->data->priorities = Priority::get();
        $this->data->users = User::get();
        if($this->model->responsible) $this->model->responsible_array = $this->model->responsible()->pluck('user_id')->toArray();
        return view('task.update')->with('model', $this->model)->with('data', $this->data);
    }

    public function store(StoreTaskRequest $request, Task $task = null)
    {
        if(!$task){
            $task = new Task();
            $task->created_by = Auth::user()->id;
        }
        $task->name = $request->name;
        $task->status_id = $request->status_id;
        $task->priority_id = $request->priority_id;
        $task->description = $request->description;
        $task->is_multi_resp = $request->has('is_multi_resp');
        $task->deadline = $request->deadline ?? Carbon::now()->addDays(7)->format('Y-m-d H:i');
        $task->updated_by = Auth::user()->id;
        $task->save();
        /** Save responsible users if any **/
        Responsible::where('task_id', $task->getKey())->delete();
        if($request->user_id){
            foreach ($request->user_id as $user)
            {
               $resp = new Responsible();
               $resp->user_id = $user;
               $resp->task_id = $task->getKey();
               $resp->save();
            }
        }
        /** Give feedback to the user **/
        $message = [];
        $message['title'] = 'Sikeres mentés';
        $message['body'] = $task->name. ' feladatot mentettük.';
        $message['buttonText'] = 'Rendben';
        Session::put('message', $message);
        return redirect()->route('home');
    }
}
