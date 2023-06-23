<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Category;
use App\Models\TaskProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.task.manage-task',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */


    // public function create()
    // {
    //     return view('admin.task.create-task',[
    //         'categories' => Category::all()
    //     ]);
    // }



    public function taskData(){
        return TaskProject::with('category')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'task_name' => 'required',
            'task_description' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);
        $task = new TaskProject();

        $task->category_id = $validated['category_id'];
        $task->task_name = $validated['task_name'];
        $task->task_description = $validated['task_description'];
        $task->date = $validated['date'];
        $task->start_time = $validated['start_time'];
        $task->end_time = $validated['end_time'];
        $task->save();

        return 'ok';
    }

    /**
     * Display the specified resource.
     */



    // public function show(string $id)
    // {
    //     //
    // }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return TaskProject::findorfail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = TaskProject::find($id);

        $task->category_id = $request->category_id;
        $task->task_name = $request->task_name;
        $task->task_description = $request->task_description;
        $task->date = $request->date;
        $task->start_time = $request->start_time;
        $task->end_time = $request->end_time;
        $task->update();
        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = TaskProject::find($id);
        $task->delete();
        return 'ok';
    }

    public function taskStatus($id){
        $task = TaskProject::find($id);
        if ($task->publication_status == 1){
            $task->publication_status = 0;
        }
        else{
            $task->publication_status = 1;
        }
        $task->save();
        return 'ok';
    }

    public function taskProcess($id){
        $task = TaskProject::find($id);
        if ($task->process == 0){
            $task->process = 1;
        }
        elseif($task->process == 1){
            $task->process = 2;
        }
        else{
            $task->process = 0;
        }
        $task->save();
        return 'ok';
    }
}
