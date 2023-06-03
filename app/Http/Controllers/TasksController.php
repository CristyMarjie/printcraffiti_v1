<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Priority;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class TasksController extends Controller
{

    public function refreshView()
    {
        $tasks_completed = Task::where('completed', 1)->get();
        $tasks_notcompleted = Task::where('completed', 0)->get();
        $priority = Priority::all();
        $users = User::all();


        // compose the date
        $data = [
            'completed' => $tasks_completed,
            'notcompleted' => $tasks_notcompleted,
            'priorities' => $priority,
            'users' => $users
        ];

        return $data;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->refreshView();
        return view('tasks.v2.tasks')->with('tasks', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // toggling status
        if ($request->method == 'toggleStatus') {
            $this->toggleStatus($request, $request->id);
        }
        // complete all tasks
        if ($request->method == 'completeAllTasks') {
            $this->completeAllTasks($request, $request->id);
        }
        // delete
        if ($request->method == 'delete') {
            $this->destroy($request->id);
        }
        // deleteAll
        if ($request->method == 'deleteAll') {
            $this->destroyAll();
        }
        // add a new task
        if ($request->method == 'addTask')
        {
            $this->addTask($request);
        }

        return redirect()->route('tasks.index');
    }

    public function addTask(Request $request)
    {
        $task = new Task;

        $task->avatar = $request->avatar;
        $task->user_id = $request->user_id;
        $task->description = $request->description;
        $task->priority_id = $request->priority_id;
        $task->completed = 0;

        $task->save();

        return;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    public function toggleStatus(Request $request, string $id)
    {
        $task = Task::where('id', $id)->first();
        $task->completed = $task->completed == 1 ? 0 : 1;
        $task->save();

        return;
    }

    public function completeAllTasks()
    {
        // KISS - Keep It Simple Stupid
        // DRY - Dont Repeat Yourself
        // YAGNI - You Aint Gonna Need It
        $tasks = Task::where('completed', 0)->update(['completed'=>1]);
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();
        return;
    }

    public function destroyAll()
    {
        $task = Task::where('id', 'like', '%%')->delete();
        return;
    }
}
