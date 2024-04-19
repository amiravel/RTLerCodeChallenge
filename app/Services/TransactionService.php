<?php

namespace App\Services;

use App\Adapters\Contracts\TransactionSummaryAdapterInterface;
use App\DataTransferObjects\SummaryDto;
use App\Enums\TransactionTypesEnums;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use App\Repositories\Contracts\WebServiceRepositoryInterface;
use App\Services\Contracts\TransactionServiceInterface;
use Illuminate\Database\Eloquent\Model;

class TransactionService extends BaseResourceService implements TransactionServiceInterface
{

    private WebServiceRepositoryInterface $webServiceRepository;
    private TransactionSummaryAdapterInterface $adapter;

    public function __construct(
        TransactionRepositoryInterface $repository,
        WebServiceRepositoryInterface $webServiceRepository,
        TransactionSummaryAdapterInterface $adapter
    )
    {
        parent::__construct($repository);
        $this->webServiceRepository = $webServiceRepository;
        $this->adapter = $adapter;
    }

    public function create(array $attributes): Model
    {
        $attributes['type'] = TransactionTypesEnums::fromName($attributes['type']);

        $attributes['webservice_id'] = $attributes['webservice_id']
            ?? $this->webServiceRepository->getFirstWebService()->id;

        return $this->repository->create($attributes);
    }

    public function summaryOfLastMonth(): SummaryDto
    {
        $groupedByAmountRange = $this->repository->filter([
            'from_date' => now()->subMonth(),
            'to_date' => now(),
        ])->groupByAmountRanges();

        $groupedByType = $this->repository->newQuery()->filter([
            'from_date' => now()->subMonth(),
            'to_date' => now(),
        ])->groupByTypes();

        return $this->adapter->convertFromSummaryQueryResultsToSummaryDto(
            $this->adapter->convertFromQueryResultToGroupByRangeDto($groupedByAmountRange),
            $this->adapter->convertFromQueryResultToGroupByTypeDto($groupedByType)
        );

    }

}
