<?php

namespace App\Adapters;

use App\Adapters\Contracts\TransactionSummaryAdapterInterface;
use App\DataTransferObjects\GroupByRangeDto;
use App\DataTransferObjects\GroupByTypeDto;
use App\DataTransferObjects\SummaryDto;

class TransactionSummaryAdapter implements TransactionSummaryAdapterInterface
{

    public function convertFromSummaryQueryResultsToSummaryDto(
        GroupByRangeDto $groupByRanges,
        GroupByTypeDto $groupByTypes
    ): SummaryDto
    {
        return new SummaryDto($groupByRanges, $groupByTypes);
    }


    public function convertFromQueryResultToGroupByTypeDto(object $groupByType): GroupByTypeDto
    {
        return new GroupByTypeDto(
            $groupByType->amount,
            $groupByType->web_count,
            $groupByType->mobile_count,
            $groupByType->pos_count,
        );
    }

    public function convertFromQueryResultToGroupByRangeDto(object $groupByRange): GroupByRangeDto
    {
        return new GroupByRangeDto(
            $groupByRange->zero_to_five_thousands,
            $groupByRange->five_thousands_to_ten_thousands,
            $groupByRange->ten_thousands_to_hundred_thousands,
            $groupByRange->over_hundred_thousands,
        );
    }
}
