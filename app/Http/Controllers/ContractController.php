<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;

class ContractController extends Controller
{

    public function showContractForm(Request $request, User $user)
    {
        return view('auth.contract', compact('user'));
    }
    public function store(Request $request)
    {

//        dd($request);
        // Validate the request data
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:30240', // 20 MB max size
        ]);

        // Handle the file upload
        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = $request->file('file')->getClientOriginalName();
            $path = $file->storeAs('contracts',$request->user()->email.'_'.$fileName,'public'); // Store the file in the 'contracts' directory in the 'public' disk

            // Create a new contract record
            Contract::create([
                'user_id' => $request->user()->id,
                'contract_name' => $request->user()->email.'_Contract',
                'file_path' => $path,
                'contract_details' => $request->user()->email.'_'.$path,
            ]);

            return redirect()->back()->with('success','file was successfully uploaded.');
        }

        return back()->with('file','file not uploaded!');
    }
}
