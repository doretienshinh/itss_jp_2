<?php

namespace App\Http\Services;

use App\Models\Spending;
use App\Models\Wallet;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SpendingService
{
    public function find($id){
        return Spending::where('id', $id)->firstOrFail();
    }

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

    public function update($request, $id){
        $oldSpendingAmount = Spending::where('id', $id)->first()->amount;
        $amount = Wallet::where('owner', Auth::user()->id)->where('using', 'true')->first()->amount;
        Wallet::where('owner', Auth::user()->id)->where('using', 'true')->update([
            'amount' => $amount - $oldSpendingAmount + $request->amount,
        ]);
        try {
            Spending::where('id', $id)->update([
                'amount' => $request->amount,
                'note' => $request->note,
                'type_id' => $request->type_id
            ]);
        } catch (\Exception $err){
            return false;
        }
        return true;
    }

    public function destroy($id){
        $spending = Spending::where('id', $id)->first();
        if($spending){
            $amount = Wallet::where('owner', Auth::user()->id)->where('using', 'true')->first()->amount;
            
            Wallet::where('owner', Auth::user()->id)->where('using', 'true')->update([
                'amount' => $amount - $spending->amount,
            ]);
            return Spending::where('id', $id)->delete();
        }
        else return false;
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