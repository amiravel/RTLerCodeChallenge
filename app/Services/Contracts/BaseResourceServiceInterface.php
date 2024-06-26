<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseResourceServiceInterface
{

    public function create(array $attributes): Model;

    public function find(int $id): Model;

    public function findOrFail(int $id): Model;

    public function paginate(int $page = 1, int $perPage = 15): LengthAwarePaginator;

    public function update(int $id, array $attributes): bool;

    public function delete(int $id): bool;

    public function forUser(int $userId): static;

    public function list();

    public function whereExists(array $conditions): bool;

    public function first(): ?Model;

    public function firstOrCreate(array $firstAttributes, array $createAttributes): Model|\Illuminate\Database\Eloquent\Builder;

    public function getQuery(): Builder;

    public function with(array $relations): self;

}
