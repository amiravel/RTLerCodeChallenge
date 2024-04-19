<?php

namespace App\Strategies\Transactions\Responses;

use App\Models\Transaction;

interface TransactionResponseInterface
{

    public function item(Transaction $transaction);

}
