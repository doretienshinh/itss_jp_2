<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'amount',
        'type_id', 
        'note'
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function spendingType()
    {
        return $this->belongsTo(SpendingType::class, 'type_id', 'id');
    }
}
