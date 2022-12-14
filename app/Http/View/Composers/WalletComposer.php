<?php

namespace App\Http\View\Composers;

use App\Models\Wallet;
use Illuminate\View\View;
use App\Http\Services\WalletService;

class WalletComposer
{
    protected $WalletService;

    public function __construct(WalletService $WalletService)
    {
        $this->WalletService = $WalletService;
    }

    public function compose(View $view)
    {
        $wallet = $this->WalletService->getUsingWallet();

        $view->with('walletUsing', $wallet);
    }
}
