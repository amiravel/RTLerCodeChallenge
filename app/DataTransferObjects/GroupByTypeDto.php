<?php

namespace App\DataTransferObjects;

class GroupByTypeDto
{

    public ?int $amount;
    public ?int $webCount;
    public ?int $mobileCount;
    public ?int $posCount;

    public function __construct(
        ?int $amount = 0,
        ?int $webCount = 0,
        ?int $mobileCount = 0,
        ?int $posCount = 0
    )
    {
        $this->amount = $amount;
        $this->webCount = $webCount;
        $this->mobileCount = $mobileCount;
        $this->posCount = $posCount;
    }

}
