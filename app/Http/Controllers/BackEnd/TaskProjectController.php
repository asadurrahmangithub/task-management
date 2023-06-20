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
            'tasks' => TaskProject::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.task.create-task',[
            'categories' => Category::all()
        ]);
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

        return redirect('/admin/task')->with('massage','Task Project Add Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = TaskProject::findorfail($id);
        return view('admin.task.edit-task',[
            'task' => $task,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_id' => 'nullable',
            'task_name' => 'required',
            'task_description' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        $task = TaskProject::find($id);

        $task->category_id = $validated['category_id'];
        $task->task_name = $validated['task_name'];
        $task->task_description = $validated['task_description'];
        $task->date = $validated['date'];
        $task->start_time = $validated['start_time'];
        $task->end_time = $validated['end_time'];
        $task->update();
        return redirect('/admin/task')->with('massage','Task Project Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = TaskProject::find($id);
        $task->delete();
        return redirect()->back()->with('massage','Task Project Delete Successfully!');
    }

    public function taskStatus($id){
        $task = TaskProject::find($id);
        if ($task->publication_status==1){
            $task->publication_status=0;
            $task->save();
            return redirect('/admin/task')->with('massage','Publication Status UnPublic Update Successfully!');
        }
        else{
            $task->publication_status=1;
            $task->save();
            return redirect('/admin/task')->with('massage','Publication Status Public Update Successfully!');
        }
    }

    public function taskProcess($id){
        $task = TaskProject::find($id);
        if ($task->process==0){
            $task->process=1;
            $task->save();
            return redirect('/admin/task')->with('massage','Task Project Status Pending Add Successfully!');
        }
        elseif($task->process==1){
            $task->process=2;
            $task->save();
            return redirect('/admin/task')->with('massage','Task Project Status Complete Successfully!');
        }
        else{
            $task->process=0;
            $task->save();
            return redirect('/admin/task')->with('massage','Task Project Status Start Add Successfully!');
        }
    }
}
