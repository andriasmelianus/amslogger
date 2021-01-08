<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\StockOpnameController;
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

    // STOCK OPNAME
    Route::group(['prefix' => 'stock-opnames', 'as' => '.stock-opnames'], function () {
        Route::get('', [StockOpnameController::class, 'index']);
    });
    // USAGE
    Route::group(['prefix' => 'usages', 'as' => '.usages'], function () {
        Route::get('', [UsageController::class, 'index']);
    });
    // RETURN
    Route::group(['prefix' => 'returns', 'as' => '.returns'], function () {
        Route::get('', [ReturnController::class, 'index']);
    });
    // REQUEST
    Route::group(['prefix' => 'requests', 'as' => '.requests'], function () {
        Route::get('', [RequestController::class, 'index']);
    });
    // PURCHASE
    Route::group(['prefix' => 'purchases', 'as' => '.purchases'], function () {
        Route::get('', [PurchaseController::class, 'index']);
    });


    // APPROVAL
    Route::group(['prefix' => 'approvals', 'as' => '.approvals'], function () {
        Route::get('', [ApprovalController::class, 'index']);
    });
});
