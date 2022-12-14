<?php

namespace App\Http\Services;

use App\Models\Spending;
use Illuminate\Support\Facades\Session;

class SpendingService
{
    public function store($request){
        // dd($request->all());
        try {
            Spending::create($request->all());
        } catch (\Exception $err){
            return false;
        }
        return true;
    }
}
