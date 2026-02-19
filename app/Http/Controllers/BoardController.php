<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Services\BoardService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BoardController extends Controller
{
    use AuthorizesRequests;

    public function __construct(
        protected BoardService $boardService
    ) {
        $this->authorizeResource(Board::class, 'board', [
            'except' => ['index']
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->boardService->getAllOwner();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->boardService->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        return $this->boardService->update($board->id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        return $this->boardService->delete($board->id);
    }
}
