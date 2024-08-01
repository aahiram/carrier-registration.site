<?php

namespace App\Http\Controllers;

use App\Mail\LoginLinkMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    public function dashboard(){

        $users = User::with('contracts')->where('type','!=','1')->get();

        return view('admin.dashboard',['users'=>$users]);
    }

    public function contracts(){

        $users = User::with('contracts')->where('type','!=','1')->get();

        return view('admin.contracts',['users'=>$users]);
    }

    public function sendLoginLink(User $user)
    {
        // Generate a temporary signed URL (valid for, e.g., 30 minutes)
        $temporarySignedRoute = URL::temporarySignedRoute(
            'user.login.form', now()->addMinutes(30), ['user' => $user->id]
        );

        // Send an email with the login link
        Mail::to($user->email)->send(new LoginLinkMail($user, $temporarySignedRoute));

        return redirect()->back()->with('success', 'Login link sent to the user.');
    }
}
