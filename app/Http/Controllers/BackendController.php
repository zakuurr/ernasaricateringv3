<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
     /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {

       if(!Auth::user())
       {
        return redirect()->route('login');
       } else {
        return view('backend/dashboard');
       }

    }
}
