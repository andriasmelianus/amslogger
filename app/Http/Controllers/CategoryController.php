<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
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
            'name' => 'required|min:2|max:32|unique:categories'
        ];
    }

    /**
     * Show index page.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function datatables()
    {
        return DataTables::of(Category::all())
            ->addColumn('action', function ($row) {
                return view('dashboard.categories.datatables.action-column', [
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
        return view('dashboard.categories.input');
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

        $instance = new Category();
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.categories')->with(['success-message' => Messages::SAVED]);
        } else {
            return redirect()->route('dashboard.categories')->with(['error-message' => Messages::ERROR_SAVING]);
        }
    }

    /**
     * Show update form.
     * 
     * @return void
     */
    public function showUpdateForm($id)
    {
        return view('dashboard.categories.input', [
            'data' => Category::find($id)
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

        $instance = Category::find($request->id);
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.categories')->with(['success-message' => Messages::UPDATED]);
        } else {
            return redirect()->route('dashboard.categories')->with(['error-message' => Messages::UPDATED]);
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
        $instance = Category::find($request->id);
        if ($instance) {
            if ($instance->delete()) {
                return redirect()->route('dashboard.categories')->with(['success-message' => Messages::DELETED]);
            } else {
                return redirect()->route('dashboard.categories')->with(['error-message' => Messages::ERROR_DELETING]);
            }
        }
    }
}
