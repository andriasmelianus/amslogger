<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
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
    public function index($id)
    {
        return view('dashboard.approvals.index');
    }

    /**
     * Show create form.
     * 
     * @return void
     */
    public function showCreateForm($id)
    {
        return view('dashboard.approvals.input');
    }

    /**
     * Create new record in database.
     * 
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
    }

    /**
     * Show update form.
     * 
     * @return void
     */
    public function showUpdateForm($id)
    {
        return view('dashboard.approvals.input');
    }

    /**
     * Update a record in database.
     * 
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
    }

    /**
     * Delete a record in database.
     * 
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
    }
}
