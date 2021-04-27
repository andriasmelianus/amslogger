<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LogsController extends Controller
{
    /**
     * Show the index page of logs reporting.
     * 
     * @return void
     */
    public function index()
    {
        return view('dashboard.report.logs.index');
    }

    /**
     * Provide data for yajra/datatables component.
     * 
     * @return array
     */
    public function datatables()
    {
        return DataTables::of(DB::table('v_running_logs'))
            ->editColumn('submitted_at', function ($row) {
                return Carbon::createFromTimeString($row->submitted_at)->diffForHumans();
            })
            ->make(true);
    }
}
