<?php

namespace App\Http\Controllers\BackEnd;

use Carbon\Carbon;

use App\Models\Blog;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $username = Auth::user()->username;

        // return response()->json($username);

        $limit = $request->input('limit', 3);
        $offset = $request->input('offset',0);

        if($username !== "admin"){
            $data = Blog::where('other',Auth::id())->with('category')->skip($offset)->take($limit)->get();
        }else{
            $data = Blog::with('category')->skip($offset)->take($limit)->get();
        }

        $formattedData = $data->map(function ($item) {
            if($item->date != null){
                return [
                    'id' => $item->id,
                    'blog_title' => $item->blog_title,
                    'category' => $item->category->name,
                    'date' => Carbon::createFromFormat('Y-m-d H:i:s', $item->date)->format('l, F j, Y g:i A'),
                    'process' => $item->process,
                    'image' => $item->image,
                    'publication_status' => $item->publication_status,
                    'elm1' => $item->elm1,
                    'author' => $item->author,



                    // other attributes...
                ];
            }else{
                return [
                    'id' => $item->id,
                    'blog_title' => $item->blog_title,
                    'category' => $item->category->name,
                    'date' => 'null',
                    'process' => $item->process,
                    'image' => $item->image,
                    'publication_status' => $item->publication_status,
                    'elm1' => $item->elm1,
                    'author' => $item->author,



                    // other attributes...
                ];
            }

        });

        return response()->json($formattedData);

        // return Blog::with('category')->latest()->get();
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
        $username = Auth::user()->username;

        $validatedData = $request->validated();

        $blog = new Blog();
        $blog->blog_title = $validatedData['blog_title'];
        $blog->category_id = $validatedData['category_id'];
        $blog->elm1 = $validatedData['elm1'];
        // $blog->date = $validatedData['date'];
        $blog->author = $username;

        if ($request->file('image')) {
            $blog->image = $this->blogImage($request);
        }

        $blog->other = Auth::id();


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
        // $username = Auth::user()->username;

        $validatedData = $request->validated();

        $blog = Blog::findorfail($request->u_id);
        $blog->blog_title = $validatedData['blog_title'];
        $blog->category_id = $validatedData['category_id'];
        $blog->elm1 = $validatedData['elm1'];

        // $blog->date = $validatedData['date'];

        // $blog->author = $username;

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
            $blog->date = Carbon::now()->setTimezone('Asia/Dhaka')->format('Y-m-d H:i:s');
        }
        else{
            $blog->publication_status = 1;
            $blog->date = Carbon::now()->setTimezone('Asia/Dhaka')->format('Y-m-d H:i:s');
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
        // elseif($blog->process == 1){
        //     $blog->process = 2;
        // }
        else{
            $blog->process = 0;
        }
        $blog->save();
        return response()->json([
            "status" => 200,
        ]);
    }

    /******************** Search Blog Function ************************/

    public function blogSearch(Request $request){
        $keyword = $request->input('keyword');
        $data = Blog::with('category')->where('blog_title','like',"%$keyword%")
                ->offset(0)->limit(3)->get();

        if($data->count() >= 1){
            return response()->json($data);
        }else{
            return response()->json([
                "status" => "no_data",
            ]);
        }


    }
}
