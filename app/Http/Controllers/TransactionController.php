<?php

namespace App\Http\Controllers;

use App\Constants\Transaction as ConstatnsTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
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
            'type' => ['required', Rule::in(ConstatnsTransaction::getAll())]
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

    /**
     * Provide data for datatables component.
     * 
     * @return Datatable
     */
    public function datatables()
    {
        return DataTables::of(Transaction::all())
            ->addColumn('action', function ($row) {
                return '';
            })
            ->make(true);
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
