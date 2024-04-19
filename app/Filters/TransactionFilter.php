<?php

namespace App\Filters;

use App\Filters\Contracts\TransactionFilterInterface;

class TransactionFilter extends BaseFilter implements TransactionFilterInterface
{

    protected array $filters = [
        'from_date',
        'to_date'
    ];

    public function from_date(string $date): void
    {
        $this->query->whereDate('created_at', '>=', $date);
    }

    public function to_date(string $date): void
    {
        $this->query->whereDate('created_at', '<', $date);
    }
}
