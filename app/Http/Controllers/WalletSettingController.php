<?php

namespace App\Http\Controllers;

use App\Http\Services\WalletService;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletSettingController extends Controller
{
    
    protected $WalletService;

    public function __construct(WalletService $WalletService) {
        $this->WalletService = $WalletService;
    }

    public function index()
    {
        $wallets = $this->WalletService->getAll();
        $walletUsing = $this->WalletService->getUsingWallet();
        return view('wallet-setting',[
            'wallets' => $wallets,
            'walletUsing' => $walletUsing
        ]);
    }

    public function store(request $request)
    {
        $this->WalletService->unActivateUsingWallet();
        Wallet::create([
            'name' => $request->get('name'),
            'owner' => Auth::user()->id,
            'using' => 'true'
        ]);
        return redirect()->back();
    }

    public function activeWallet(request $request){
        $this->WalletService->activateWallet($request->wallet_id);

        return redirect()->back();
    }
}
