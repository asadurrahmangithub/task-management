<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        if (isset($request['remember'])){
            //set up cookie
            setcookie("user_email", $request->email, time() + (86400 * 30));
            setcookie("user_password", $request->password, time() + (86400 * 30));

            session_start();
            session_regenerate_id(true);
            $_SESSION['id'] = session_id();

        }

        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        if($request->user()->role === 'admin'){
            $url = 'admin/dashboard';
        }elseif($request->user()->role === 'manager'){
            $url = 'manager/dashboard';
        }elseif($request->user()->role === 'member'){
            $url = '/dashboard';
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
