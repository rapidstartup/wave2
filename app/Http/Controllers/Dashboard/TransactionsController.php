<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index() {
        if (Auth::user() == null)
        {
            return redirect()->route('login');
        }
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.transaction.transactions', compact('transactions'));
    }

    public function view_transaction($id) {
        if (Auth::user() == null)
        {
            return redirect()->route('login');
        }
        $transaction = Transaction::where('transaction_id', '=', $id)->first();
        return view('dashboard.transaction.view_transaction', compact('transaction'));
    }
}
