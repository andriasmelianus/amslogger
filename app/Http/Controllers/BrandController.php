<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
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
            'name' => 'required|min:2|max:32|unique:brands'
        ];
    }

    /**
     * Show index page.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.brands.index');
    }

    /**
     * Provide data for datatables component.
     * 
     * @return Datatables
     */
    public function datatables()
    {
        return DataTables::of(Brand::all())
            ->addColumn('action', function ($row) {
                return view('dashboard.brands.datatables.action-column', [
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
        return view('dashboard.brands.input');
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

        $instance = new Brand();
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.brands')->with(['success-message' => Messages::SAVED]);
        } else {
            return redirect()->route('dashboard.brands')->with(['error-message' => Messages::ERROR_SAVING]);
        }
    }

    /**
     * Show update form.
     * 
     * @return void
     */
    public function showUpdateForm($id)
    {
        return view('dashboard.brands.input', [
            'data' => Brand::find($id)
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

        $instance = Brand::find($request->id);
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.brands')->with(['success-message' => Messages::UPDATED]);
        } else {
            return redirect()->route('dashboard.brands')->with(['error-message' => Messages::ERROR_UPDATING]);
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
        $instance = Brand::find($request->id);
        if ($instance) {
            if ($instance->delete()) {
                return redirect()->route('dashboard.brands')->with(['success-message' => Messages::DELETED]);
            } else {
                return redirect()->route('dashboard.brands')->with(['error-message' => Messages::ERROR_DELETING]);
            }
        }
    }
}
