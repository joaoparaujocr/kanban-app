<?php

namespace App\Repositories;

use App\Models\Board;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\BoardContract;

class BoardRepository extends BaseRepository implements BoardContract
{
    public function __construct(
        protected Board $board
    ) {
        parent::__construct($this->board);
    }
}
