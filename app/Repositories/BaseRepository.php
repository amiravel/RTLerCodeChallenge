<?php

namespace App\Repositories;

use App\Filters\Contracts\BaseFilterInterface;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    protected Builder $query;

    protected BaseFilterInterface $filter;

    public function __construct(
        Model $model,
        BaseFilterInterface $filter
    )
    {
        $this->model = $model;
        $this->query = $this->model->newQuery();
        $this->filter = $filter;
    }

    public function create($attributes): Model
    {
        return $this->query->create($attributes);
    }

    public function find(int $id): Model
    {
        return $this->query->find($id);
    }

    public function findOrFail(int $id): Model
    {
        return $this->query->findOrFail($id);
    }

    public function update(int $id, $attributes): bool
    {
        return $this->query->where('id', $id)
            ->update($attributes);
    }

    public function delete(int $id): bool
    {
        return $this->query->where('id', $id)->delete();
    }

    public function forUser(int $userId): static
    {
        $this->query = $this->query->where('user_id', $userId);

        return $this;
    }

    public function paginate(int $page = 1, int $perPage = 12, array $columns = ['*']): LengthAwarePaginator
    {
        return $this->query->paginate($perPage, $columns, 'page', $page);
    }

    public function with(array|string $relations): static
    {
        $this->query->with($relations);

        return $this;
    }

    public function list(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->query->get();
    }

    public function limit(int $limit): static
    {
        $this->query->limit($limit);

        return $this;
    }

    public function firstOrCreate(array $findAttributes, array  $createAttributes): Model|Builder
    {
        return $this->query->firstOrCreate($findAttributes, $createAttributes);
    }

    public function filter(array $filters): static
    {
        $this->query = $this->filter->apply($this->query, $filters);

        return $this;
    }

    public function insert(array $items)
    {
        $this->query->insert($items);
    }

    public function getQuery(): Builder
    {
        return $this->query;
    }

    public function whereExists(array $conditions): bool
    {
        return $this->query->where($conditions)->exists();
    }

    public function first(): ?Model
    {
        return $this->query->first();
    }

    public function newQuery(): static
    {
        $this->query->newQuery();

        return $this;
    }

    public function firstOrFail(): Model|Builder
    {
        return $this->query->firstOrFail();
    }
}
