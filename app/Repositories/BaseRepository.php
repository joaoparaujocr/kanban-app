<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseContract
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
        $resource = $this->find($id);

        $resource->update($data);

        return $resource;
    }

    public function delete(int|string $id): bool|null
    {
        $resource = $this->find($id);

        return $resource->delete();
    }
}
