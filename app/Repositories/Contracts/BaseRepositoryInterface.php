<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{

    public function paginate(int $page = 1, int $perPage = 12, array $columns = ['*']): LengthAwarePaginator;

    public function create($attributes): Model;

    public function find(int $id): Model;

    public function findOrFail(int $id): Model;

    public function update(int $id, $attributes): bool;

    public function delete(int $id): bool;

    public function forUser(int $userId);

    public function with(array|string $relations): static;

    public function limit(int $limit): static;

    public function firstOrCreate(array $findAttributes, array  $createAttributes): Model|Builder;

//    public function filter(array $filters): static;

    public function insert(array $items);

    public function getQuery(): Builder;

    public function whereExists(array $conditions): bool;

    public function first(): ?Model;

    public function newQuery(): static;

    public function firstOrFail(): Model|Builder;

}
