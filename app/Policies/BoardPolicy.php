<?php

namespace App\Policies;

use App\Models\Board;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BoardPolicy
{
    private function defaultResponse(bool $isAllow): Response
    {
        return $isAllow
            ? Response::allow()
            : Response::denyWithStatus(404);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Board $board): Response
    {
        return $this->defaultResponse($user->id === $board->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Board $board): Response
    {
        return $this->defaultResponse($user->id === $board->user_id);
    }
}
