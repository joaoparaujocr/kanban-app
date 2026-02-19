<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    public function __construct(
        protected Model $model
    ) {}

    public function find(int|string $id): ?Model
    {
        return $this->model->find($id);
    }

    public function findAll(): Collection
    {
        return $this->model->get();
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int|string $id, array $data): Model
    {
        return $this->model
            ->where('id', $id)
            ->update($data);
    }

    public function delete(int|string $id): bool|null
    {
        return $this->model->delete($id);
    }
}
