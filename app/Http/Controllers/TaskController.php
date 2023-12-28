<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    //
   public function index(){
    $tasks = QueryBuilder::for(Task::class)
    ->allowedFilters('titel')
    ->allowedSorts(['id' ,'titel' ,'is_done' ,'created_at'])
    ->paginate();
    $user = Auth::user();
    return new TaskCollection($user->tasks);
    // return response()->json(Task::all());
    // return Task::all();
   }
    public function show(Task $task)
    {

        $user = Auth::user();
        $tasks = $user->tasks;

        if (!$tasks->isEmpty() && $tasks->contains($task)) {
            return new TaskResource($task);
        } else {
            return response()->json(['message' => 'no tasks for you']);
        }
    }
//    public function showwithtask(Task $task){

//     return new TaskResource($task);

//    }

    public function store(StoreTaskRequest $request){
       
        $validated = $request->validated();

        // $task = Task::create($validated);
        $user = Auth::user();
        $task = $user->tasks()->create($validated);
       
        return new TaskResource($task);
    }
   
    public function update(UpdateTaskRequest $request ,Task $task){
        
        $validated = $request->validated();

        $task->update($validated);

        return new TaskResource($task);
    }
    public function destroy(Task $task)
    {
        $task->delete();

        $message = 'Task deleted successfully';

        return response()->json(['message' => $message]);
        // return response()->noContent();
    }
}
