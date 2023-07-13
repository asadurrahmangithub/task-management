<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {

        if(Auth::check()) {

            $username = '';
            $id = Auth::user()->id;
            $user = User::where([['id', $id],['status', 'active'],['role','admin']])->first();
            $username = $user->username;

            // dd($username);

            view()->share('username', $username);
        }

        if($request->user()->role !== $role){
            return redirect('dashboard');
        }
        return $next($request);
    }
}
