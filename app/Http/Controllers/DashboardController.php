<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Displays dashboard index page.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.index');
    }
}
