<?php

namespace App\Adapters\Contracts;

use App\DataTransferObjects\GroupByRangeDto;
use App\DataTransferObjects\GroupByTypeDto;
use App\DataTransferObjects\SummaryDto;

interface TransactionSummaryAdapterInterface
{

    public function convertFromSummaryQueryResultsToSummaryDto(
        GroupByRangeDto $groupByRanges,
        GroupByTypeDto $groupByTypes
    ): SummaryDto;

    public function convertFromQueryResultToGroupByTypeDto(object $groupByType): GroupByTypeDto;
    public function convertFromQueryResultToGroupByRangeDto(object $groupByRange): GroupByRangeDto;

}
