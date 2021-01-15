<?php

namespace App\Http\Controllers;

use App\Constants\Messages;
use App\Constants\Transaction as ConstantsTransaction;
use App\Models\Category;
use App\Models\Log;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\RedisHandler;
use Yajra\DataTables\DataTables;

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
        return view('dashboard.usages.index-alt', [
            'data' => User::find(Auth::id())->transactions()->isUsage()->isSubmitted()->orderByDesc('updated_at')->paginate(10)
        ]);
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
            ->addColumn('name', function ($row) {
                return view('dashboard.usages.datatables.name-column', [
                    'data' => $row
                ]);
            })
            ->addColumn('status', function ($row) {
                return view('dashboard.usages.datatables.status-column', [
                    'data' => $row
                ]);
            })
            ->editColumn('updated_at', function ($row) {
                return $row->updated_at->diffForHumans();
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
        $transactionNotSubmitted = User::find(Auth::id())->transactions()->isNotSubmitted()->firstOrCreate(['type' => ConstantsTransaction::TYPE_USAGE, 'user_id' => Auth::id()]);
        return view('dashboard.usages.input', [
            'transaction' => $transactionNotSubmitted,

            'categories' => Category::all()
        ]);
    }

    /**
     * Add item to usage transaction.
     * 
     * @param Request $request
     * @return void
     */
    public function addItem(Request $request)
    {
        if ($request->item_id == null) {
            return redirect()->back()->with([
                'error-message' => Messages::ITEM_EMPTY
            ]);
        } else {
            $item = DB::table('v_items')->where('id', $request->item_id)->first();
            if ($item->on_hand < $request->quantity) {
                return redirect()->back()->with([
                    'error-message' => 'Stok barang tidak mencukupi, silahkan ajukan permintaan.'
                ]);
            }
        }

        $transaction = Transaction::find($request->transaction_id);
        $transaction->logs()->create([
            'item_id' => $request->item_id,
            'quantity' => ($request->quantity * -1), // Usage means subtracting stock
            'description' => $request->description,
            'user_id_requester' => Auth::id()
        ]);

        return redirect()->back()->with([
            'success-message' => Messages::ADDED_ITEM
        ]);
    }

    /**
     * Remove item from transaction.
     * 
     * @param Request $request
     * @return  void
     */
    public function removeItem(Request $request)
    {
        $log = Log::find($request->log_id_to_delete);
        if ($log->delete()) {
            return redirect()->back()->with([
                'success-message' => Messages::REMOVED_ITEM
            ]);
        } else {
            return redirect()->back()->with([
                'error-message' => Messages::ERROR_REMOVING_ITEM
            ]);
        }
    }

    /**
     * Create new record in database.
     * 
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $data = Transaction::find($request->transaction_id);
        if ($data->logs()->count() == 0) {
            return redirect()->back()->with([
                'error-message' => Messages::ITEM_EMPTY
            ]);
        }

        $data->submitted_at = now();
        if ($data->save()) {
            return redirect()->route('dashboard.usages.create-status', [
                'transaction_id' => $data->id
            ]);
        } else {
            return redirect()->back()->with([
                'error-message' => Messages::ERROR_SAVING
            ]);
        }
    }

    /**
     * Show success page after transaction is submitted.
     * 
     * @return void
     */
    public function showCreateStatus(Request $request)
    {
        $data = Transaction::find($request->transaction_id);
        return view('dashboard.usages.status', [
            'data' => $data
        ]);
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
