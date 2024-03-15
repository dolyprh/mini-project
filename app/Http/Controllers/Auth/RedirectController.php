<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cek()
    {
        if(auth()->user()->role == "admin") {
            return redirect('/dashboard');
        } elseif (auth()->user()->role == "pj") {
            return redirect('/dashboard'); 
        } elseif (auth()->user()->role == "asisten") {
            return redirect('/dashboard');
        } 
    }
}
