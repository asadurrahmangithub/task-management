<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.manage-category',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect('/admin/category')->with('massage','Category Add Successfully!');
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
        $category = Category::find($id);
        return view('admin.category.edit-category',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findorfail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->update();

        return redirect('/admin/category')->with('massage','Category Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('massage','Category Delete Successfully!');
    }

    public function categoryStatus($id){
        $category = Category::find($id);
        if ($category->publication_status==1){
            $category->publication_status=0;
            $category->save();
            return redirect('/admin/category')->with('massage','Publication Status UnPublic Update Successfully!');
        }
        else{
            $category->publication_status=1;
            $category->save();
            return redirect('/admin/category')->with('massage','Publication Status Public Update Successfully!');
        }
    }
}
