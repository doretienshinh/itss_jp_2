<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Http\Services\WalletService;
use App\Http\Services\SpendingTypeService;
use App\Http\Services\SpendingService;

class HomeController extends Controller
{
    protected $WalletService, $SpendingTypeService, $SpendingService;

    public function __construct(WalletService $WalletService, SpendingTypeService $SpendingTypeService, SpendingService $SpendingService){
        $this->WalletService = $WalletService;
        $this->SpendingTypeService = $SpendingTypeService;
        $this->SpendingService = $SpendingService;
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
        $spendings = $this->SpendingService->getAllByWallet($wallet->id);
        // dd($spendings);
        $SpendingTypes = $this->SpendingTypeService->getAll();
        // dd($SpendingTypes);
        return view('home-page', [
            'wallet' => $wallet,
            'spendings' => $spendings,
            'SpendingTypes' => $SpendingTypes
        ]);
    }
}
