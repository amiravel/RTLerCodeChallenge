<?php

namespace App\Services;

use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Services\Contracts\BaseResourceServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseResourceService implements BaseResourceServiceInterface
{

    protected BaseRepositoryInterface $repository;

    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $attributes): Model
    {
        return $this->repository->create($attributes);
    }

    public function find(int $id): Model
    {
        return $this->repository->find($id);
    }

    public function findOrFail(int $id): Model
    {
        return $this->repository->findOrFail($id);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->repository->update($id, $attributes);
    }

    public function paginate(int $page = 1, int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($page, $perPage);
    }

    public function forUser(int $userId): static
    {
        $this->repository->forUser($userId);

        return $this;
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function whereExists(array $conditions): bool
    {
        return $this->repository->whereExists($conditions);
    }

    public function first(): ?Model
    {
        return $this->repository->first();
    }

    public function firstOrCreate(array $firstAttributes, array $createAttributes): Model|\Illuminate\Database\Eloquent\Builder
    {
        return $this->repository->firstOrCreate($firstAttributes, $createAttributes);
    }

    public function getQuery(): Builder
    {
        return $this->repository->getQuery();
    }

    public function with(array $relations): self
    {
        $this->repository->with($relations);

        return $this;
    }

}
