<?php

namespace App\Services;

use App\Models\Board;
use App\Repositories\Contracts\BoardContract;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class BoardService extends BaseService
{
    public function __construct(
        protected BoardContract $boardContract
    ) {}

    public function get(int|string $id): ?Board
    {
        return $this->boardContract->find($id);
    }

    public function getAll(): Collection
    {
        return $this->boardContract->findAll();
    }

    public function getAllOwner(): Collection
    {
        return $this->boardContract->findAll()->where('user_id', '=', Auth::id());
    }

    public function create(array $data = []): Board
    {
        $data['user_id'] = Auth::id();
        return $this->boardContract->create($data);
    }

    public function update(int|string $id, array $data = []): Board
    {
        return $this->boardContract->update($id, $data);
    }

    public function delete(int|string $id): bool|null
    {
        return $this->boardContract->delete($id);
    }
}
