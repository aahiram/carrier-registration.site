<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function information()
    {
        return view('auth.information');
    }


    public function store(Request $request)
    {
        return view('auth.information');
    }
}
