<?php

namespace App\Repositories;

use App\Filters\Contracts\BaseFilterInterface;
use App\Models\Webservice;
use App\Repositories\Contracts\WebServiceRepositoryInterface;

class WebServiceRepository extends BaseRepository implements WebServiceRepositoryInterface
{

    public function __construct(Webservice $model, BaseFilterInterface $filter)
    {
        parent::__construct($model, $filter);
    }

    public function getFirstWebService()
    {
        return $this->query->where('name', 'first')->first();
    }

}
