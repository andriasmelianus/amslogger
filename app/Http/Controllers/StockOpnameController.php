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

class StockOpnameController extends Controller
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
        return view('dashboard.stock-opnames.index');
    }

    /**
     * Show create form.
     * 
     * @return void
     */
    public function showCreateForm()
    {
        $transactionNotSubmitted = User::find(Auth::id())->transactions()->isNotSubmitted()->firstOrCreate(['type' => ConstantsTransaction::TYPE_STOCK_OPNAME, 'user_id' => Auth::id()]);
        return view('dashboard.stock-opnames.input', [
            'transaction' => $transactionNotSubmitted,

            'categories' => Category::all()
        ]);
    }

    /**
     * Print 
     */
    public function printForm()
    {
        return view('dashboard.stock-opnames.print.form', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Add item to stock opname transaction.
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
            if ($request->quantity == 0) {
                return redirect()->back()->with([
                    'error-message' => 'Input hanya stok yang mengalami selisih saja.'
                ]);
            }
        }

        $transaction = Transaction::find($request->transaction_id);
        $transaction->logs()->create([
            'item_id' => $request->item_id,
            'quantity' => ($request->quantity), // Selisih tidak perlu diubah
            'description' => $request->description,
            'user_id_requester' => Auth::id()
        ]);

        return redirect()->back()->with([
            'category_id' => $request->category_id,
            'success-message' => Messages::ADDED_ITEM
        ]);
    }

    /**
     * 
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
            return redirect()->route('dashboard.stock-opnames.create-status', [
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
        return view('dashboard.stock-opnames.status', [
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
        return view('dashboard.stock-opnames.input');
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
