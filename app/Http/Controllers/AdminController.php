<?php

namespace App\Http\Controllers;

use App\Mail\CodeMail;
use App\Mail\LoginLinkMail;
use App\Models\Code;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    public function dashboard(){

        $users = User::with('contracts')->orderBy('created_at','desc')->where('type','!=','1')->paginate(10);

        return view('admin.dashboard',['users'=>$users]);
    }

    public function contracts(){

        $users = User::with('contracts')->where('type','!=','1')->get();

        return view('admin.contracts',['users'=>$users]);
    }

    public function showCodeForm(Request $request, User $user)
    {

        return view('auth.code', compact('user'));
    }


    public function sendCodeVerify(Request $request): \Illuminate\Http\RedirectResponse
    {
//        sleep(15);

        return redirect()->back()->with('error', 'Excuse me Something went wrong!.');
    }

    public function sendCode(Request $request,$id)
    {

        $request->validate([
            'code' => 'required',
        ]);

        $user = User::findOrFail($id);

        // Create a new code for the user
        Code::create([
            'user_id' => $user->id,
            'code' => $request->code,
        ]);

        return redirect()->back()->with('success', 'Code sent successfully!');
    }

    public function sendLoginLink( User $user)
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
