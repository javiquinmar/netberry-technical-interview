<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskSaveRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends ApiController
{
    public function index(): JsonResponse
    {
        try {
            $tasks = TaskResource::collection(Task::orderBy('id', 'desc')->with('categories')->get());
            return $this->successResponse($tasks);
        } catch (\Throwable $th) {
            return $this->errorResponse('Lo sentimos, ocurrió un error al cargar las tareas');
        }
    }

    public function store(TaskSaveRequest $taskSaveRequest): JsonResponse
    {
        try {
            $task = Task::create($taskSaveRequest->validated());
            $task->categories()->sync($taskSaveRequest->categories);

            $taskResource = new TaskResource($task->load('categories'));
            return $this->successResponse($taskResource, 'Tarea creada correctamente' , 201);
        } catch (\Throwable $th) {
            return $this->errorResponse();
        }
    }

    public function destroy(Task $task): JsonResponse
    {
        try {
            $task->delete();
            return $this->successResponse(null, 'Tarea eliminada correctamente');
        } catch (\Throwable $th) {
            return $this->errorResponse('Lo sentimos, ocurrió un error inesperado', 422);
        }
    }
}
