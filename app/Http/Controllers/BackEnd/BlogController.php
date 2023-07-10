<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Blog::with('category')->latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return  view("admin.blog.blog",[
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $validatedData = $request->validated();

        $blog = new Blog();
        $blog->blog_title = $validatedData['blog_title'];
        $blog->category_id = $validatedData['category_id'];
        $blog->elm1 = $validatedData['elm1'];
        $blog->date = $validatedData['date'];
        $blog->author = $validatedData['author'];
        if ($request->file('image')) {
            $blog->image = $this->blogImage($request);
        }

        // return  $blog->image;
        $blog->save();

        return response()->json([
            "status" => 200,
        ]);
    }


    private function blogImage(Request $request){
        $image = $request->file('image');
        // return $image->extension();
        $imageNewName = 'blog-image'.'-'.rand().'.'.$image->extension();
        $directory = 'admin/assets/blog-image/';
        $imgUrl = $directory.$imageNewName;
        $image->move($directory, $imageNewName);
        return $imgUrl;
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
        return Blog::findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request)
    {
        $validatedData = $request->validated();

        $blog = Blog::findorfail($request->u_id);
        $blog->blog_title = $validatedData['blog_title'];
        $blog->category_id = $validatedData['category_id'];
        $blog->elm1 = $validatedData['elm1'];
        $blog->date = $validatedData['date'];
        $blog->author = $validatedData['author'];
        if ($request->hasFile('image')){
            if ($request->file('image')) {
                if (file_exists($blog->image)) {
                    unlink($blog->image);
                }
                $blog->image = $this->blogImage($request);
            }
        }

        $blog->save();

        return response()->json([
            "status" => 200,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findorfail($id);
        if (file_exists($blog->image)) {
            unlink($blog->image);
        }
        $blog->delete();
        return response()->json([
            "status" => 200,
        ]);
    }

    public function blogStatus($id){
        $blog = Blog::findorfail($id);
        if ($blog->publication_status == 1){
            $blog->publication_status = 0;
        }
        else{
            $blog->publication_status = 1;
        }
        $blog->save();
        return response()->json([
            "status" => 200
        ]);
    }
    public function blogProcess($id){
        $blog = Blog::findorfail($id);
        if ($blog->process == 0){
            $blog->process = 1;
        }
        elseif($blog->process == 1){
            $blog->process = 2;
        }
        else{
            $blog->process = 0;
        }
        $blog->save();
        return response()->json([
            "status" => 200,
        ]);
    }
}
