<?php

namespace App\Strategies\Transactions\Responses;

use App\Http\Resources\PosTransactionResource;
use App\Models\Transaction;

class PosTransactionResponse implements TransactionResponseInterface
{

    public function item(Transaction $transaction)
    {
        return response(PosTransactionResource::make($transaction), 200);
    }
}
