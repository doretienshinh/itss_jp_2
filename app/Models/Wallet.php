<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner',
        'using'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'owner');
    }

    public function spendings()
    {
        return $this->hasMany(Spending::class);
    }
}
