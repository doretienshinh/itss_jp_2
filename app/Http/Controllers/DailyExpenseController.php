<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyExpenseController extends Controller
{
    public function index()
    {
        return view('daily-expense');
    }
}
