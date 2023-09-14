<?php

namespace App\Http\Composers;
use App\Models\Transaction;
use Illuminate\View\View;

class TransactionData
{
    public function compose(View $view) {
        $transactions = Transaction::all();
        $view->with('transactions', $transactions);
    }
}
