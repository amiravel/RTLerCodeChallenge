<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TransactionStoreRequest;
use App\Http\Resources\TransactionSummaryResource;
use App\Models\Transaction;
use App\Services\Contracts\TransactionServiceInterface;
use App\Strategies\Transactions\Responses\TransactionResponse;
use App\Utilities\Contracts\ResponseInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{


    private TransactionServiceInterface $transactionService;
    private ResponseInterface $response;

    public function __construct(
        TransactionServiceInterface $transactionService,
        ResponseInterface           $response
    )
    {
        $this->transactionService = $transactionService;
        $this->response = $response;
    }

    public function index()
    {
        return $this->response->item(
            TransactionSummaryResource::make(
                $this->transactionService->summaryOfLastMonth()
            )
        );
    }

    public function store(TransactionStoreRequest $request)
    {
        /**
         * @var Transaction $transaction
         */
        $transaction = $this->transactionService->create($request->validated());

        return TransactionResponse::item($transaction);
    }

}
