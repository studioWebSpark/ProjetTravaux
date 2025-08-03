<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();
        if ($user->role === 'admin') {
            return redirect('/dashboard-admin');
        } elseif ($user->role === 'artisan' || $user->role === 'pro') {
            return redirect('/dashboard/pro');
        } else {
            return redirect('/dashboard/user');
        }
    }
}
