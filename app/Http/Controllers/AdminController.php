<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\TaskProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function create(){
        return view("admin.user.user");
    }
    public function allUser(){

        return User::where('role','admin')->latest()->get();

    }
    public function userStore(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required',

        ]);
        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            "status" => 200,
        ]);
    }
    public function deleteUser($id){
        $user = User::findorfail($id);
        $user->delete();
        return response()->json([
            "status" => 200,
        ]);
    }
    public function index(Request $request){

        // Filter data Function

        // $query = TaskProject::query();

        // if(isset($request->date) && ($request->date != null)){
        //     $query->where('date',$request->date);
        // }

        // $tasks = $query->get();
        // End Filter data Function

        return view("admin.dashboard.dashboard",[
            'tasks' => TaskProject::with('category')->get(),

        ]);
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
