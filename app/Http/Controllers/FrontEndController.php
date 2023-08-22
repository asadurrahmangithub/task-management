<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;

use App\Models\Blog;
use Inertia\Inertia;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return Inertia::render('Master');
    }


    public function showData(){

        // echo Carbon::now()->setTimezone('Asia/Dhaka')->format('Y-m-d H:i:s');

        return Blog::where([['publication_status',1],['process',1]])->get();

    }




    public function blogDetailsApi($id){

        $blog = Blog::findOrfail($id);

        return response()->json([
            'id' => $blog->id,
            'blog_title' => $blog->blog_title,
            'elm1' => $blog->elm1,
            'image' => $blog->image
        ]);
    }

    public function blogDetails($id){

        return Inertia::render('Master');
    }


    public function blogSearch(Request $request){
        $query = $request->get('q');
        $results = Blog::where([['blog_title','like',"%$query%"],['publication_status',1],['process',1]])->get();
        return response()->json($results);
    }
}
