<?php

namespace App\Http\Composers;
use App\Models\InterestLog;
use Illuminate\View\View;

class InterestData
{
    public function compose(View $view) {
        if(request()->username){
            $transactions = InterestLog::whereHas('user',function($q){
                $q->where('username','like','%'.request()->username.'%');
            })->latest()->paginate();
        }else{
            $transactions = InterestLog::latest()->paginate();
        }
        $view->with('transactions', $transactions);
    }
}
