<?php

namespace App\Repositories\Contracts;

interface TransactionRepositoryInterface extends BaseRepositoryInterface
{


    public function groupByTypes();

    public function groupByAmountRanges();

}
