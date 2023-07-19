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
        $categories = Category::latest()->paginate(3);
        return view('admin.category.manage-category',compact('categories'));
    }

    // public function categoryData(){
    //     return Category::latest()->limit(3)->get();
    // }


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
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',


        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->save();

        return response()->json([
            "status" => 200
        ]);
    }

    /**
     * Display the specified resource.
     */

    public function show()
    {
        $categories = Category::latest()->paginate(3);
        return view('admin.category.pagination',compact('categories'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            "status" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            "status" => 200
        ]);
    }

    public function categoryStatus($id){
        $category = Category::find($id);
        if ($category->publication_status == '1'){
            $category->publication_status = 0;

        }
        elseif($category->publication_status == '0'){
            $category->publication_status = 1;
        }
        $category->save();
        return response()->json([
            "status" => 200,
        ]);
    }

    /******************** Category Data Search  ***************************/

    public function categorySearch(Request $request){
        $categories = Category::where('name','like','%'.$request->search_string.'%')
        ->orWhere('description','like','%'.$request->search_string.'%')
        ->orderBy('id','desc')
        ->paginate(3);

        if($categories->count() >= 1){
            return view('admin.category.pagination',compact('categories'))->render();
        }else{
            return response()->json([
                "status" => "no_data",
            ]);
        }
    }
}
