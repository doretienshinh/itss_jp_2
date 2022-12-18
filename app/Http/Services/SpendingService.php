<?php

namespace App\Http\Services;

use App\Models\Spending;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class SpendingService
{
    public function store($request){
        // dd($request->all());
        try {
            Spending::create($request->all());
        } catch (\Exception $err){
            return false;
        }
        return true;
    }

    public function getMonthSpending($wallet_id){
        return Spending::where('wallet_id', $wallet_id)->whereMonth('created_at', Carbon::now()->month)->get();
    }

    public function getMonthSpendingByType($wallet_id, $type){
        return Spending::where('wallet_id', $wallet_id)->where('type_id', $type)->whereMonth('created_at', Carbon::now()->month)->get();
    }
}
