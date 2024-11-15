<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
class GameApiController extends Controller
{
    public function index(): JsonResponse
    {
        $games = Game::all();
        return response()->json($games, 200);
    }
    public function show(string $id): JsonResponse
    {
        $games = Game::findOrFail($id);
        return response()->json($games, 200);
    }
}