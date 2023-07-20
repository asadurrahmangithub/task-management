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
        // $categories = Category::latest();
        return view('admin.category.manage-category');
    }

    public function categoryData(Request $request){
        $limit = $request->input('limit',3);
        $offset = $request->input('offset',0);
        $data = Category::skip($offset)->take($limit)->get();

        return response()->json($data);
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

        $keyword = $request->input('keyword');
        $data = Category::where('name','like',"%$keyword%")
        ->orWhere('description','like',"%$keyword%")
        ->offset(0)->limit(3)
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
