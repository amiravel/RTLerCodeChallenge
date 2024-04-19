<?php

namespace App\DataTransferObjects;

class GroupByRangeDto
{

    public ?int $zeroToFiveThousands;
    public ?int $fiveToTenThousands;
    public ?int $tenToHundredThousands;
    public ?int $overHundredThousands;

    public function __construct(
        ?int $zeroToFiveThousands = 0,
        ?int $fiveToTenThousands = 0,
        ?int $tenToHundredThousands = 0,
        ?int $overHundredThousands = 0
    )
    {
        $this->zeroToFiveThousands = $zeroToFiveThousands;
        $this->fiveToTenThousands = $fiveToTenThousands;
        $this->tenToHundredThousands = $tenToHundredThousands;
        $this->overHundredThousands = $overHundredThousands;
    }

}
