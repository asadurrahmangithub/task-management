<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.manage-project',[
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.project.add-project',[
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new Project();

        $project->category_id = $request->category_id;
        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        $project->start_date = $request->start_date;
        $project->submit_date = $request->submit_date;

        $project->save();
        return redirect('/admin/project')->with('massage','Project Add Successfully!');
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
    public function edit(Project $project)
    {
        if($project != null){
            return view('admin.project.edit-project',[
                'project' => $project,
                'categories' => Category::all(),
            ]);
        }

        return abort();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findorfail($id);

        $project->category_id = $request->category_id;
        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        $project->start_date = $request->start_date;
        $project->submit_date = $request->submit_date;

        $project->update();
        return redirect('/admin/project')->with('massage','Project Add Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->back()->with('massage','Project Delete Successfully!');
    }

    public function projectStatus($id){
        $project = Project::find($id);
        if ($project->publication_status==1){
            $project->publication_status=0;
            $project->save();
            return redirect('/admin/project')->with('massage','Publication Status UnPublic Update Successfully!');
        }
        else{
            $project->publication_status=1;
            $project->save();
            return redirect('/admin/project')->with('massage','Publication Status Public Update Successfully!');
        }
    }

    public function projectProcess($id){
        $project = Project::find($id);
        if ($project->process==0){
            $project->process=1;
            $project->save();
            return redirect('/admin/project')->with('massage','Project Status Pending Add Successfully!');
        }
        elseif($project->process==1){
            $project->process=2;
            $project->save();
            return redirect('/admin/project')->with('massage','Project Status Complete Successfully!');
        }
        else{
            $project->process=0;
            $project->save();
            return redirect('/admin/project')->with('massage','Project Status Start Add Successfully!');
        }
    }
}






