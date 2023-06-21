<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\TaskProject;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request){

        // Filter data Function

        // $query = TaskProject::query();

        // if(isset($request->date) && ($request->date != null)){
        //     $query->where('date',$request->date);
        // }

        // $tasks = $query->get();
        // End Filter data Function

        return view("admin.dashboard.dashboard",[
            'tasks1' => TaskProject::where('process',0)->with('category')->get(),
            'tasks2' => TaskProject::where('process',1)->with('category')->get(),
            'tasks3' => TaskProject::where('process',2)->with('category')->get(),

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
