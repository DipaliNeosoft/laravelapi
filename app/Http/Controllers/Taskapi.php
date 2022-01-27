<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Validator;

class Taskapi extends Controller
{
   public function index()
    {
     
        $data = Task::latest()->get();
       
        return response(['tasks'=>TaskResource::collection($data),'message'=>'fetched successfully']);
     
    }
    public function store(Request $req){

        $validator = Validator::make($req->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required'
        ]);
        if($validator->fails()){
            return response(['error'=>$validator->errors(),'validation error']);
        }
        else{
            $task = new Task;
            $task->name = $req->name;
            $task->description = $req->description;
            if($task->save()){
                return response(['tasks'=>new TaskResource($task),'message'=>'created successfully']);
            }
            else{
                return response(['msg'=>'Task does  not added']);
            }
        }
    }
    public function update(Request $req,$id){
        $task=Task::findOrFail($id);
        $task->name=$req->name;
        $task->description=$req->description;
        if($task->save()){
            return new TaskResource($task);
        }
    }
    public function show($id){
        $task=Task::findOrFail($id);
        if($task){
            return response(['task found'=>new TaskResource($task),'message'=>'id found']);
        }
        else{
            return response(['message'=>'id does not found']);
        }
    }
    public function destroy($id){
        $task=Task::findOrFail($id);
        if($task->delete()){
            return new TaskResource($task);
        }  
    }
}
