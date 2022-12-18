<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SpendingService;

class DailyExpenseController extends Controller
{
    protected $SpendingService;

    public function __construct(SpendingService $SpendingService){
        $this->SpendingService = $SpendingService;
    }

    public function store(Request $request)
    {
        $result = $this->SpendingService->store($request);
        
        return redirect()->back();
    }
}
