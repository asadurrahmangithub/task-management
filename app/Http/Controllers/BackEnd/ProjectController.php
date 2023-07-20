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
        return view('admin.project.manage-project',[
            // 'project'=>Project::with('category')->get(),
            'categories' => Category::all(),
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

        $validated = $request->validate([
            'category_id' => 'required',
            'project_name' => 'required',
            'project_description' => 'required',
            'start_date' => 'required',
            'submit_date' => 'required',


        ]);
        $project = new Project();

        $project->category_id = $validated['category_id'];
        $project->project_name = $validated['project_name'];
        $project->project_description = $validated['project_description'];
        $project->start_date = $validated['start_date'];
        $project->submit_date = $validated['submit_date'];

        $project->save();
        return 'ok';
    }

    public function projectDate(Request $request){
        $limit = $request->input('limit',2);
        $offset = $request->input('offset',0);
        $data = Project::with('category')->skip($offset)->take($limit)->get();
        return response()->json($data);
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
        return Project::find($id);



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
        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();
        return 'ok';
    }

    public function projectStatus($id){
        $project = Project::find($id);
        if ($project->publication_status == 1){
            $project->publication_status = 0;
        }
        else{
            $project->publication_status = 1;

        }
        $project->save();
        return 'ok';
    }

    public function projectProcess($id){
        $project = Project::find($id);
        if ($project->process == 0){
            $project->process = 1;
        }
        elseif($project->process == 1){
            $project->process = 2;
        }
        else{
            $project->process = 0;
        }
        $project->save();
        return 'ok';
    }

    /******************** Category Data Search  ***************************/

    public function projectSearch(Request $request){

        $keyword = $request->input('keyword');
        $data = Project::with('category')->where('project_name','like',"%$keyword%")
        ->orWhere('project_description','like',"%$keyword%")
        ->offset(0)->limit(2)
        ->get();

        if($data->count() >= 1){
            return response()->json($data);
        }else{
            return response()->json([
                "status" => "no_data",
            ]);
        }
    }
}






