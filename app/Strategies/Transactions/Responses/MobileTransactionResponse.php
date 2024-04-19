<?php

namespace App\Strategies\Transactions\Responses;

use App\Models\Transaction;

class MobileTransactionResponse implements TransactionResponseInterface
{

    public function item(Transaction $transaction)
    {
        return response([], 201);
    }
}
