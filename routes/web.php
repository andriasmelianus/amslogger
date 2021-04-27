<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UsageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Default auth routes from Laravel Breeze.
 */
require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard', 'as' => 'dashboard'], function () {
    Route::get('', [DashboardController::class, 'index']);

    // PROFILE
    Route::group(['as' => '.profile'], function () {
        Route::get('change-password', [ProfileController::class, 'showChangePasswordForm'])->name('.change-password-form');
        Route::post('change-password', [ProfileController::class, 'changePassword'])->name('.change-password');
        Route::get('update', [ProfileController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('update', [ProfileController::class, 'update'])->name('.update');
    });

    // ITEM
    Route::group(['prefix' => 'items', 'as' => '.items'], function () {
        Route::get('', [ItemController::class, 'index']);
        Route::get('datatables', [ItemController::class, 'datatables'])->name('.datatables');
        Route::get('create', [ItemController::class, 'showCreateForm'])->name('.create-form');
        Route::get('update/{id}', [ItemController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('create', [ItemController::class, 'create'])->name('.create');
        Route::post('update', [ItemController::class, 'update'])->name('.update');
        Route::post('delete', [ItemController::class, 'delete'])->name('.delete');

        Route::get('search-autocomplete', [ItemController::class, 'searchAutocomplete'])->name('.search-autocomplete');
    });
    // UNIT
    Route::group(['prefix' => 'units', 'as' => '.units'], function () {
        Route::get('', [UnitController::class, 'index']);
        Route::get('datatables', [UnitController::class, 'datatables'])->name('.datatables');
        Route::get('create', [UnitController::class, 'showCreateForm'])->name('.create-form');
        Route::get('update/{id}', [UnitController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('create', [UnitController::class, 'create'])->name('.create');
        Route::post('update', [UnitController::class, 'update'])->name('.update');
        Route::post('delete', [UnitController::class, 'delete'])->name('.delete');
    });
    // BRAND
    Route::group(['prefix' => 'brands', 'as' => '.brands'], function () {
        Route::get('', [BrandController::class, 'index']);
        Route::get('datatables', [BrandController::class, 'datatables'])->name('.datatables');
        Route::get('create', [BrandController::class, 'showCreateForm'])->name('.create-form');
        Route::get('update/{id}', [BrandController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('create', [BrandController::class, 'create'])->name('.create');
        Route::post('update', [BrandController::class, 'update'])->name('.update');
        Route::post('delete', [BrandController::class, 'delete'])->name('.delete');
    });
    // CATEGORY
    Route::group(['prefix' => 'categories', 'as' => '.categories'], function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::get('datatables', [CategoryController::class, 'datatables'])->name('.datatables');
        Route::get('create', [CategoryController::class, 'showCreateForm'])->name('.create-form');
        Route::get('update/{id}', [CategoryController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('create', [CategoryController::class, 'create'])->name('.create');
        Route::post('update', [CategoryController::class, 'update'])->name('.update');
        Route::post('delete', [CategoryController::class, 'delete'])->name('.delete');
    });

    // TRANSACTION
    Route::group(['prefix' => 'transaction', 'as' => '.transactions'], function () {
        Route::get('', [TransactionController::class, 'index']);
    });

    // STOCK OPNAME
    Route::group(['prefix' => 'stock-opnames', 'as' => '.stock-opnames'], function () {
        Route::get('', [StockOpnameController::class, 'index']);
        Route::get('create', [StockOpnameController::class, 'showCreateForm'])->name('.create-form');
        Route::get('print-form', [StockOpnameController::class, 'printForm'])->name('.print-form');
        Route::get('create-status', [StockOpnameController::class, 'showCreateStatus'])->name('.create-status');
        Route::get('update/{id}', [StockOpnameController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('add-item', [StockOpnameController::class, 'addItem'])->name('.add-item');
        Route::post('remove-item', [StockOpnameController::class, 'removeItem'])->name('.remove-item');
        Route::post('create', [StockOpnameController::class, 'create'])->name('.create');
        Route::post('update', [StockOpnameController::class, 'update'])->name('.update');
        Route::post('delete', [StockOpnameController::class, 'delete'])->name('.delete');
    });
    // USAGE
    Route::group(['prefix' => 'usages', 'as' => '.usages'], function () {
        Route::get('', [UsageController::class, 'index']);
        Route::get('datatables', [UsageController::class, 'datatables'])->name('.datatables');
        Route::get('create', [UsageController::class, 'showCreateForm'])->name('.create-form');
        Route::get('create-status', [UsageController::class, 'showCreateStatus'])->name('.create-status');
        Route::get('update/{id}', [UsageController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('add-item', [UsageController::class, 'addItem'])->name('.add-item');
        Route::post('remove-item', [UsageController::class, 'removeItem'])->name('.remove-item');
        Route::post('create', [UsageController::class, 'create'])->name('.create');
        Route::post('update', [UsageController::class, 'update'])->name('.update');
        Route::post('delete', [UsageController::class, 'delete'])->name('.delete');
    });
    // RETURN
    Route::group(['prefix' => 'returns', 'as' => '.returns'], function () {
        Route::get('', [ReturnController::class, 'index']);
        Route::get('create', [ReturnController::class, 'showCreateForm'])->name('.create-form');
        Route::get('update/{id}', [ReturnController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('create', [ReturnController::class, 'create'])->name('.create');
        Route::post('update', [ReturnController::class, 'update'])->name('.update');
        Route::post('delete', [ReturnController::class, 'delete'])->name('.delete');
    });
    // REQUEST
    Route::group(['prefix' => 'requests', 'as' => '.requests'], function () {
        Route::get('', [RequestController::class, 'index']);
        Route::get('create', [RequestController::class, 'showCreateForm'])->name('.create-form');
        Route::get('update/{id}', [RequestController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('create', [RequestController::class, 'create'])->name('.create');
        Route::post('update', [RequestController::class, 'update'])->name('.update');
        Route::post('delete', [RequestController::class, 'delete'])->name('.delete');
    });
    // PURCHASE
    Route::group(['prefix' => 'purchases', 'as' => '.purchases'], function () {
        Route::get('', [PurchaseController::class, 'index']);
        Route::get('create', [PurchaseController::class, 'showCreateForm'])->name('.create-form');
        Route::get('update/{id}', [PurchaseController::class, 'showUpdateForm'])->name('.update-form');
        Route::post('create', [PurchaseController::class, 'create'])->name('.create');
        Route::post('update', [PurchaseController::class, 'update'])->name('.update');
        Route::post('delete', [PurchaseController::class, 'delete'])->name('.delete');
    });


    // APPROVAL
    Route::group(['prefix' => 'approvals', 'as' => '.approvals'], function () {
        Route::get('', [ApprovalController::class, 'index']);
    });


    // REPORTING
    Route::group(['prefix' => 'report', 'as' => '.report'], function () {
        Route::group(['prefix' => 'logs', 'as' => '.logs'], function () {
            Route::get('', [LogsController::class, 'index']);
            Route::get('datatables', [LogsController::class, 'datatables'])->name('.datatables');
        });
    });
});
