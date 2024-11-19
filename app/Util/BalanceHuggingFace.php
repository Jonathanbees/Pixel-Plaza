<?php

// Esteban

namespace App\Util;

use App\Interfaces\BalanceGenerator;
use App\Models\Game;
use Illuminate\Support\Facades\Http;

class BalanceHuggingFace implements BalanceGenerator
{
    public function generateBalance(Game $game): string
    {
        $reviews = $game->getReviews();
        $comments = $reviews->pluck('comment')->implode(' | ');

        $prompt = "Generate a summary of the balance of the next comments about the game {$game->getName()} that has a rating of {$game->getRating()}, also, say the reasons of the good and bad comments, that's the vital part: {$comments}";

        $apiKey = env('HUGGINGFACE_API_KEY');
        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiKey",
        ])->post('https://api-inference.huggingface.co/models/your-model', [
            'inputs' => $prompt,
        ]);

        $balanceMarkdown = $response->json()['generated_text'];
        $balanceHtml = FormattingUtil::convertMarkdownToHtml($balanceMarkdown);

        return $balanceHtml;
    }
}
