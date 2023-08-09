<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index() {
        if (Auth::user() == null)
        {
            return redirect()->route('login');
        }
        return view('dashboard.wallet.wallet');
    }
}
