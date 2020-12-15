<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Constructor.
     * 
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display start page.
     * 
     * @return void
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }
    }
}
