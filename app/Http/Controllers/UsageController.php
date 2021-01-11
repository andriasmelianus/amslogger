<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsageController extends Controller
{
    private $rules;

    /**
     * Constructor.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->rules = [
            'transaction_id' => 'required|numeric',
            'item_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'price' => 'nullable|numeric',
            'user_id_requester' => 'required|numeric',
            'user_id_approver' => 'nullable|numeric',
        ];
    }

    /**
     * Show index page.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.usages.index');
    }

    public function datatables()
    {
    }

    /**
     * Show create form.
     * 
     * @return void
     */
    public function showCreateForm()
    {
        return view('dashboard.usages.input');
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
        return view('dashboard.usages.input');
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
