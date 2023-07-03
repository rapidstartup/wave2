<?php

namespace App\Http\Controllers\Voyager;

use App\Models\MonthlyInterest;
use Illuminate\Support\Carbon;
use TCG\Voyager\Http\Controllers\VoyagerBreadController;

class InterestsController extends VoyagerBreadController
{
    public function index()
    {
        $date = Carbon::now()->toArray();
        $month = $date['month'];
        $day = $date['day'];

        $monthlyInterest = MonthlyInterest::where('month', '=', 'march')->first();

        return view('vendor.voyager.interests.browse', compact('month', 'day', 'monthlyInterest'));
    }

}
