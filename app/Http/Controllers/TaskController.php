<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Http;
use App\Services\ExternalPostService;

class TaskController extends Controller
{
    //endpoint GET/items
    public function fctGetItems(){
        $task = Task::all();
        return response() -> json($task, 200);
    }

    //endpoint GET/items/id
     public function fctGetItemsById($id){
        $task = Task::find($id);
        //validamos
        if(!$task){
            return response()->json([
                'message' => 'Task not found'
            ], 404);
        }
        return response() -> json($task, 200);
    }

    //endpoint POST/items
    public function fctPostItems(Request $request){
        if(empty($request->all())){
            return response() -> json(['message' => 'Request body cannot be empty'], 400);
        }

        $validated = $request->validate([
            'title' => 'required|string|min:5|max:100',
            'status' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:10|max:255'
        ]);

        $task = Task::create($validated);
        //respondemos
        return response() -> json([
            'message' => 'Task created successfully'
        ], 201);
    }

    //endpoint PUT/items/id
    public function fctPutItemById(Request $request, $id){
        $task = Task::find($id);
        
        if (!$task){
            return response() -> json(['message' => 'Task no found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|min:5|max:100',
            'status' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:10|max:255'   
        ]);

       //$task = update($validated);
       $task -> title = $validated['title'];
       $task -> status = $validated['status'];
       $task -> description = $validated['description'];

       $task->save();

        return response() ->json([
            'message' => 'Task update successfully',
            'data' => $task
        ], 200);
    }

    //endpoint DELETE/items/id
    public function fctDeleteItemById($id){
        $task = Task::find($id);
        if (!$task){
            return response() -> json(['message' => 'Task no found'], 404);
        }
        $task->delete();
        return response() -> json(['message' => 'Task delete successfully'], 200);
    }

    //endpoint externo https://jsonplaceholder.typicode.com/posts
    public function fctGetExternalPosts(ExternalPostService $service){
    try {

        $data = $service->getPosts();

        return response()->json([
            'message' => 'External posts retrieved successfully',
            'data' => $data
        ], 200);

    } catch (\Exception $e) {

        return response()->json([
        'message' => 'External service unavailable',
        'error' => $e->getMessage()
    ], 503);
    }
}
}