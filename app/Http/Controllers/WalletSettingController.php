<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletSettingController extends Controller
{
    public function index()
    {
        return view('wallet-setting');
    }
}
