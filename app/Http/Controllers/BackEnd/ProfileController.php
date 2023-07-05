<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view("admin.profile.profile",[
            'profile' => Profile::first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable',
        ]);

        $profile = Profile::first();

        if($profile){

            $profile->name = $validated['name'];
            if ($request->file('image')) {
                if (file_exists($profile->image)) {
                    unlink($profile->image);
                    $profile->image = $this->image($request);
                }
            }


        }
        else{
            $profile = new Profile();
            $profile->name = $validated['name'];
            $profile->image = $this->image($request);
        }
        $profile->save();
        return response()->json([
            'status' => 200,
        ]);
    }


    private function image($request){
        $image = $request->file('image');
        $imageName = 'profile-image'.'-'.rand().'.'.$image->extension();
        $directory = 'admin/assets/profile-image/';
        $image->move($directory, $imageName);
        return $directory.$imageName;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
