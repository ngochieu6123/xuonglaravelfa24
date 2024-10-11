<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($projectId)
    {
        $project = Project::findOrFail($projectId);
        return $project->tasks;
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
    public function store(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $task = $project->tasks()->create($request->all());
        return response()
            ->json([
                'message' => 'Nhiệm vụ được tạo',
                'task' => $task
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        return $task;
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
    public function update(Request $request, $projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        $task->update($request->all());
        return response()
            ->json([
                'message' => 'Nhiệm vụ được cập nhật',
                'task' => $task
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($projectId, $taskId)
    {
        $task = Task::where('project_id', $projectId)->findOrFail($taskId);
        $task->delete();
        return response()
            ->json([
                'message' => 'Nhiệm vụ được xóa'
            ], 200);
    }
}
