<?php

namespace App\Filters\Contracts;

interface TransactionFilterInterface extends BaseFilterInterface
{

    public function from_date(string $date);
    public function to_date(string $date);

}
