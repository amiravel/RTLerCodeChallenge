<?php

namespace App\Filters\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface BaseFilterInterface
{

    public function apply(Builder $query, $filters): Builder;

}
