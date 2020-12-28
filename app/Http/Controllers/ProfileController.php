<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * Show index page.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.profile.index');
    }

    /**
     * Show change password form.
     * 
     * @return void
     */
    public function showChangePasswordForm()
    {
        return view('dashboard.change-password');
    }

    /**
     * Change user password.
     * 
     * @param Request $request
     * @return void
     */
    public function changePassword(Request $request)
    {
    }

    /**
     * Show update profile form.
     * 
     * @return void
     */
    public function showUpdateForm()
    {
        return view('dashboard.update');
    }

    /**
     * Update profile in database.
     * 
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
    }
}
