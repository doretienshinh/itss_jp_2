<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Http\Services\WalletService;
use App\Http\Services\SpendingTypeService;

class HomeController extends Controller
{
    protected $WalletService, $SpendingTypeService;

    public function __construct(WalletService $WalletService, SpendingTypeService $SpendingTypeService){
        $this->WalletService = $WalletService;
        $this->SpendingTypeService = $SpendingTypeService;
    }

    public function index()
    {
        if (Auth::user()->wallets->isEmpty()) {
            Wallet::create([
                'name' => 'シングルウォレット',
                'owner' => Auth::user()->id,
                'using' => 'true'
            ]);
        };

        $wallet = $this->WalletService->getUsingWallet();
        $SpendingTypes = $this->SpendingTypeService->getAll();
        // dd($SpendingTypes);
        return view('home-page', [
            'wallet' => $wallet,
            'SpendingTypes' => $SpendingTypes
        ]);
    }
}
