<?php

namespace App\Http\Services;

use App\Models\Spending;
use App\Models\Wallet;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SpendingService
{
    public function store($request){
        $amount = Wallet::where('id', $request->wallet_id)->first()->amount;
        
        Wallet::where('id', $request->wallet_id)->update([
            'amount' => $amount + $request->amount,
         ]);
        try {
            Spending::create($request->all());
        } catch (\Exception $err){
            return false;
        }
        return true;
    }

    public function getAllByWallet($wallet_id){
        return Spending::where('wallet_id', $wallet_id)->orderBy('created_at', 'DESC')->get();
    }

    public function getMonthSpending($wallet_id){
        $month = Carbon::now()->month();
        $days = date("d");
        for($i=0; $i < $days ; ++$i) {
            $amount[$i] = 0;
        }
        $amount = [];
        $spending = [];
        $sum = Wallet::where('owner', Auth::user()->id)->where('using', 'true')->firstOrFail()->amount;
        for($i=0; $i < $days ; ++$i) {
            $spending[$i] = Spending::where('wallet_id', $wallet_id)->whereMonth('created_at', $month)->whereDay('created_at', $i+1)->sum('amount');
        }
        for($i=$days-1; $i >= 0 ; --$i) {
            if($i == $days-1) {$amount[$i] = $sum; }
            else {$amount[$i] = $amount[$i+1] - $spending[$i+1];}
        }
        return [$amount, $spending];
    }
    
    public function getMonthSpendingByType($wallet_id, $type){
        return Spending::where('wallet_id', $wallet_id)->where('type_id', $type)->whereMonth('created_at', Carbon::now()->month)->get();
    }
}
