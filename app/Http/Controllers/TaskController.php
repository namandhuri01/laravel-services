<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    private $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    
    public function index() 
    {
        $tasks = Task::where('user_id',auth()->user()->id)->paginate(15);
        $tasks = TaskResource::collection($tasks);
        return view('task.index',compact('tasks'));
    }

    public function store(TaskRequest $request)
    {
        $task = $this->taskService->storeTask($request->validated());

        return redirect(route('task.index'));
        
    }

    
}
