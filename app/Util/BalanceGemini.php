<?php

// Esteban

namespace App\Util;

use App\Interfaces\BalanceGenerator;
use App\Models\Game;
use Gemini;

class BalanceGemini implements BalanceGenerator
{
    public function generateBalance(Game $game): string
    {
        $reviews = $game->getReviews();
        $comments = $reviews->pluck('comment')->implode(' | ');

        $prompt = "Generate a summary of the balance of the next comments about the game {$game->getName()} that has a rating of {$game->getRating()}, also, say the reasons of the good and bad comments, that's the vital part: {$comments}";

        $apiKey = env('GEMINI_API_KEY');
        $client = Gemini::client($apiKey);

        $result = $client->geminiPro()->generateContent($prompt);

        $balanceMarkdown = $result->text();
        $balanceHtml = FormattingUtil::convertMarkdownToHtml($balanceMarkdown);

        return $balanceHtml;
    }
}
