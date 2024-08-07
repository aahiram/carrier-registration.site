<?php

namespace App\Http\Controllers;

use App\Mail\LoginLinkMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
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
        try {
            $temporarySignedRoute = URL::temporarySignedRoute(
                'contract', now()->addMinutes(30), ['user' => $user->id]
            );

            Mail::to($user->email)->send(new LoginLinkMail($user, $temporarySignedRoute));

            // Log the successful sending
            Log::info('Login link sent to user: ' . $user->email);

            return redirect()->back()->with('success', 'Contract link sent to the user.');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to send login link to user: ' . $user->email . '. Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to send contract link to the user.');
        }
    }
}
