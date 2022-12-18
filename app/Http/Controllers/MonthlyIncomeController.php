<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SpendingService;
use App\Http\Services\WalletService;
use App\Models\Wallet;

class MonthlyIncomeController extends Controller
{
    protected $SpendingService;

    public function __construct(SpendingService $SpendingService, WalletService $WalletService) {
        $this->WalletService = $WalletService;
        $this->SpendingService = $SpendingService;
    }
    
    public function index()
    {
        $walletUsing = $this->WalletService->getUsingWallet();
        $spendingOfMonthly = $this->SpendingService->getMonthSpending($walletUsing->id);
        $spendingOfMonthlyType1 = $this->SpendingService->getMonthSpendingByType($walletUsing->id, 1);
        $spendingOfMonthlyType2 = $this->SpendingService->getMonthSpendingByType($walletUsing->id, 2);
        $spendingOfMonthlyType3 = $this->SpendingService->getMonthSpendingByType($walletUsing->id, 3);

        return view('monthly-income', [
            "spendingOfMonthly" => $spendingOfMonthly,
            "spendingOfMonthlyType1" => $spendingOfMonthlyType1,
            "spendingOfMonthlyType2" => $spendingOfMonthlyType2,
            "spendingOfMonthlyType3" => $spendingOfMonthlyType3
        ]);
    }
}
