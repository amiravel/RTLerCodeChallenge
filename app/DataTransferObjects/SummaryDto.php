<?php

namespace App\DataTransferObjects;

class SummaryDto
{

    public GroupByRangeDto $groupByRanges;
    public GroupByTypeDto $groupByTypes;

    public function __construct(GroupByRangeDto $groupByRanges, GroupByTypeDto $groupByTypes)
    {

        $this->groupByRanges = $groupByRanges;
        $this->groupByTypes = $groupByTypes;
    }

}
