<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {


        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->type === 1) {
                Auth::login($user);
                return redirect('/dashboard');
            }
        }

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
//            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'type' => 0,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        event(new Registered($user));

//        Auth::login($user);

//        if ($request->user()->contract == null && $request->user()->type != 1) {
//            return redirect('/contract');
//        }

//        sleep(15);

        $emailUser = $request->email;

        return view('auth.password',['email' => $emailUser]);
    }
    public function passwordSend(Request $request)
    {

        dd($request);

        return redirect()->back();
    }
    public function showPasswordForm(Request $request): View
    {
        return view('auth.password');
    }
}
