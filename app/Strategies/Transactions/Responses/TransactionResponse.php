<?php

namespace App\Strategies\Transactions\Responses;

use App\Models\Transaction;
use Illuminate\Support\Facades\Facade;

/**
 * @method static item(Transaction $transaction)
 */
class TransactionResponse extends Facade
{

    protected static function getFacadeAccessor()
    {

        $strategies = [
            'pos' => PosTransactionResponse::class,
            'mobile' => MobileTransactionResponse::class,
            'web' => WebTransactionResponse::class
        ];

        return $strategies[request()->get('type')];
    }


}
