<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UnitController extends Controller
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
            'name' => 'required|min:2|max:32'
        ];
    }

    /**
     * Show index page.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.units.index');
    }

    /**
     * Provide data for datatables component.
     * 
     * @return Datatable
     */
    public function datatables()
    {
        return DataTables::of(Unit::all())
            ->addColumn('action', function ($row) {
                return view('dashboard.units.datatables.action-column', [
                    'data' => $row
                ]);
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
        return view('dashboard.units.input');
    }

    /**
     * Create new record in database.
     * 
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $this->validate($request, $this->rules);

        $instance = new Unit();
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.units')->with(['success-message' => Messages::SAVED]);
        } else {
            return redirect()->route('dashboard.units')->with(['error-message' => Messages::ERROR_SAVING]);
        }
    }

    /**
     * Show update form.
     * 
     * @return void
     */
    public function showUpdateForm($id)
    {
        return view('dashboard.units.input', [
            'data' => Unit::find($id)
        ]);
    }

    /**
     * Update a record in database.
     * 
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $this->validate($request, $this->rules);

        $instance = Unit::find($request->id);
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.units')->with(['success-message' => Messages::UPDATED]);
        } else {
            return redirect()->route('dashboard.units')->with(['success-message' => Messages::UPDATED]);
        }
    }

    /**
     * Delete a record in database.
     * 
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        $instance = Unit::find($request->id);
        if ($instance) {
            if ($instance->delete()) {
                return redirect()->route('dashboard.units')->with(['success-message' => Messages::DELETED]);
            } else {
                return redirect()->route('dashboard.units')->with(['error-message' => Messages::ERROR_DELETING]);
            }
        }
    }
}
