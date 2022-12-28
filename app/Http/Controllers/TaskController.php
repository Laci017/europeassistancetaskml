<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(StoreTaskRequest $request, Task $task = null)
    {
        /** ide kell majd store method **/
        if(!$task){
            $task = new Task();
            $task->created_by = Auth::user()->id;
        }
        $task->name = $request->name ?? null;
        $task->status_id = $request->status_id;
        $task->priority_id = $request->priority_id ?? null;
        $task->description = $request->description ?? null;
        $task->deadline = $request->deadline ?? Carbon::now()->addDays(7)->format('Y-m-d H:i');
        $task->save();
        return redirect()->route('home');
    }
}
