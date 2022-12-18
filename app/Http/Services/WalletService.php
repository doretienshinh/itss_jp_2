<?php

namespace App\Http\Services;

use App\Models\Wallet;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class WalletService
{
    public function getUsingWallet() {
        return Wallet::where('owner', Auth::user()->id)->where('using', 'true')->firstOrFail();
    }

    public function getAll() {
        return Wallet::where('owner', Auth::user()->id)->get();
    }

    public function activateWallet($wallet_id) {
        Wallet::where('owner', Auth::user()->id)->where('using', 'true')->update([
            'using' => 'false'
         ]);
        Wallet::where('id', $wallet_id)->update([
            'using' => 'true'
         ]);
    }

    public function unActivateUsingWallet() {
        Wallet::where('owner', Auth::user()->id)->where('using', 'true')->update([
            'using' => 'false'
         ]);
    }
}
