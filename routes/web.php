<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use Wave\Facades\Wave;
use App\Http\Controllers\Dashboard\DashboardHomeController;
use App\Http\Controllers\Dashboard\TransactionsController;
use App\Http\Controllers\Dashboard\WalletController;
use App\Http\Controllers\Dashboard\SupportController;

// Authentication routes
Auth::routes();

// Voyager Admin routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('dashboard/home', [DashboardHomeController::class, 'home'])->name('dashboard.home');
Route::post('dashboard/setGoal', [DashboardHomeController::class, 'store'])->name('dashboard.setGoal');
Route::get('dashboard/transactions', [TransactionsController::class, 'index'])->name('dashboard.transactions');
Route::get('dashboard/transaction/{id}', [TransactionsController::class, 'view_transaction'])->name('view.transaction');

Route::get('dashboard/wallet', [WalletController::class, 'index'])->name('dashboard.wallet');

Route::get('dashboard/support', [SupportController::class, 'index'])->name('dashboard.support_tickets');
Route::get('dashboard/support/create-ticket', [SupportController::class, 'create_ticket'])->name('dashboard.create_ticket');
Route::post('dashboard/support/store-ticket', [SupportController::class, 'store_ticket'])->name('dashboard.store_ticket');

// Wave routes
Wave::routes();
