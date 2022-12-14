<?php

namespace App\Http\Services;

use App\Models\SpendingType;
use Illuminate\Support\Facades\Session;

class SpendingTypeService
{
    public function getAll() {
        return SpendingType::get();
    }
}
