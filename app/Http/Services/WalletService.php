<?php

namespace App\Http\Services;

use App\Models\Wallet;
use Illuminate\Support\Facades\Session;

class WalletService
{
    public function getUsingWallet() {
        return Wallet::where('using', 'true')->firstOrFail();
    }
}
