<?php

namespace App\Services\Contracts;

use App\Repositories\Contracts\BaseRepositoryInterface;

interface TransactionServiceInterface extends BaseResourceServiceInterface
{

    public function summaryOfLastMonth();

}
