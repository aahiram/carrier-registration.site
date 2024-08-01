<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showPasswordForm(Request $request, User $user)
    {
        return view('auth.login_form', compact('user'));
    }

    public function login(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if ($request->password === $user->password) {
            Auth::login($user);
            return redirect('/profile');
        }

        return redirect()->back()->withErrors(['password' => 'Incorrect password']);
    }
}
