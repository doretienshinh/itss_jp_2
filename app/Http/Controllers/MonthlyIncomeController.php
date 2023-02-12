<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $days = date("d");

        $walletUsing = $this->WalletService->getUsingWallet();
        list($amountInDays, $spendingInDays) = $this->SpendingService->getMonthSpending($walletUsing->id);
        // dd($this->SpendingService->getMonthSpending($walletUsing->id));
        // array_reverse($amountInDays);
        $spendingOfMonthlyType1 = $this->SpendingService->getMonthSpendingByType($walletUsing->id, 1);
        $spendingOfMonthlyType2 = $this->SpendingService->getMonthSpendingByType($walletUsing->id, 2);
        $spendingOfMonthlyType3 = $this->SpendingService->getMonthSpendingByType($walletUsing->id, 3);
        // dd($amountInDays, $spendingInDays);
        return view('monthly-income', [
            "days" => $days,
            "amountInDays" => array_reverse($amountInDays),
            "spendingInDays" => $spendingInDays,
            "spendingOfMonthlyType1" => $spendingOfMonthlyType1,
            "spendingOfMonthlyType2" => $spendingOfMonthlyType2,
            "spendingOfMonthlyType3" => $spendingOfMonthlyType3
        ]);
    }
}
