<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class ItemController extends Controller
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
            'name' => 'required|min:3|max:32|unique:items,name',
            'name_for_vendor' => 'required|min:3|max:32|unique:items,name_for_vendor',
            'unit_id' => 'nullable|numeric',
            'brand_id' => 'nullable|numeric',
            'category_id' => 'nullable|numeric',
        ];
    }

    /**
     * Show index page.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.items.index');
    }

    /**
     * Menyediakan data untuk yajra datatables
     * 
     * @return Datatable
     */
    public function datatables()
    {
        return DataTables::of(DB::table('v_items'))
            ->addColumn('action', function ($row) {
                return view('dashboard.items.datatables.action-column', [
                    'data' => $row
                ]);
            })
            ->editColumn('description', function ($row) {
                return view('dashboard.items.datatables.description-column', [
                    'data' => $row
                ]);
            })
            ->editColumn('updated_at', function ($row) {
                return Carbon::createFromTimeString($row->updated_at)->diffForHumans();
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
        return view('dashboard.items.input', [
            'units' => Unit::all(),
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
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

        $instance = new Item();
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.items')->with(['success-message' => Messages::SAVED]);
        } else {
            return redirect()->route('dashboard.items')->with(['error-message' => Messages::ERROR_SAVING]);
        }
    }

    /**
     * Show update form.
     * 
     * @return void
     */
    public function showUpdateForm($id)
    {
        return view('dashboard.items.input', [
            'data' => Item::find($id),
            'units' => Unit::all(),
            'brands' => Brand::all(),
            'categories' => Category::all()
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
        $updateRules = $this->rules;
        $updateRules['name'] = ['required', 'min:3', 'max:32', Rule::unique('items', 'name')->ignore($request->id)];
        $updateRules['name_for_vendor'] = ['required', 'min:3', 'max:32', Rule::unique('items', 'name_for_vendor')->ignore($request->id)];
        $this->validate($request, $updateRules);

        $instance = Item::find($request->id);
        $instance->fill($request->all());
        if ($instance->save()) {
            return redirect()->route('dashboard.items')->with(['success-message' => Messages::UPDATED]);
        } else {
            return redirect()->route('dashboard.items')->with(['error-message' => Messages::ERROR_UPDATING]);
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
        $instance = Item::find($request->id);
        if ($instance) {
            if ($instance->delete()) {
                return redirect()->route('dashboard.items')->with(['success-message' => Messages::DELETED]);
            } else {
                return redirect()->route('dashboard.items')->with(['error-message' => Messages::ERROR_DELETING]);
            }
        }
    }

    /**
     * Provide autocomplete item.
     * 
     * @param Request $request
     * @return array
     */
    public function searchAutocomplete(Request $request)
    {
        $categoryId = $request->get('category_id') ?? Category::first()->id;
        $data = DB::table('v_items')
            // ->select(DB::raw('id AS data, name AS value'))
            ->where('category_id', $categoryId)
            ->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->get('query') . '%')
                    ->orWhere('name_for_vendor', 'LIKE', '%' . $request->get('query') . '%');
            });

        $suggestions = [];
        $suggestions['suggestions'] = $data->get();
        return response()->json($suggestions);
    }
}
