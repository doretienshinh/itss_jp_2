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
    
    public function update(Request $request, $id)
    {
        $this->SpendingService->update($request, $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->SpendingService->destroy($id);
        return redirect()->back();
    }

    public function find(Request $request)
    {
        return $this->SpendingService->find($request->id);
    }
}
