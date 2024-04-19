<?php

namespace App\Repositories;

use App\Filters\Contracts\TransactionFilterInterface;
use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepositoryInterface;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{

    public function __construct(Transaction $model, TransactionFilterInterface $transactionFilter)
    {
        parent::__construct($model, $transactionFilter);
    }

    public function groupByTypes()
    {
        return $this->query->selectRaw('
            SUM(amount) AS amount,
            SUM(IF(type = 0, 1, 0)) AS web_count,
            SUM(IF(type = 1, 1, 0)) AS mobile_count,
            SUM(IF(type = 2, 1, 0)) AS pos_count
        ')->first();
    }

    public function groupByAmountRanges()
    {
        return $this->query->selectRaw('
                SUM(IF(amount BETWEEN 0 AND 5000, 1, 0)) AS "zero_to_five_thousands",
                SUM(IF(amount BETWEEN 5001 AND 10000, 1, 0)) AS "five_thousands_to_ten_thousands",
                SUM(IF(amount BETWEEN 10001 AND 100000, 1, 0)) AS "ten_thousands_to_hundred_thousands",
                SUM(IF(amount >= 1000001, 1, 0)) AS "over_hundred_thousands"
        ')->first();
    }
}
