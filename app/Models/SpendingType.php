<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendingType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function spendings()
    {
        return $this->hasMany(Spending::class,'type_id', 'id');
    }
}
