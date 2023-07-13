<?php

namespace App\Providers;

use App\Models\User;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $id = Auth::user()->id;
        // $user = User::where([['id', 12],['status', 'active']])->first();
        // $username = $user->username;

        $profile = Profile::first();
        view()->share('profile', $profile);
        // view()->share('username', $username);
    }


}
