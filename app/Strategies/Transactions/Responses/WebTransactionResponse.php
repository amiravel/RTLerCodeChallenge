<?php

namespace App\Strategies\Transactions\Responses;

use App\Http\Resources\WebTransactionResource;
use App\Models\Transaction;

class WebTransactionResponse implements TransactionResponseInterface
{

    public function item(Transaction $transaction)
    {
        return response(WebTransactionResource::make($transaction), 200);
    }
}
