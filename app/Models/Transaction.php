<?php

namespace App\Models;

use App\Enums\TransactionTypesEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'type' => TransactionTypesEnums::class
    ];
}
