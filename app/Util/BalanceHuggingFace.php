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
        $comments = $reviews->map(fn ($review) => "{$review->comment}")->implode('. ');

        // Configura las preguntas
        $positiveQuestion = "From the following reviews, give me all the positive aspects mentioned about the game '{$game->getName()}'. Be so detailed, answer in english and use complete sentences.";
        $negativeQuestion = "From the following reviews, give me all the negative aspects mentioned about the game '{$game->getName()}'. Be so detailed, answer in english and use complete sentences.";

        // Obtén respuestas para ambas preguntas
        $positiveAnswer = $this->askQuestion($positiveQuestion, $comments);
        $negativeAnswer = $this->askQuestion($negativeQuestion, $comments);

        // Genera el resultado en formato Markdown
        $balanceMarkdown = "**Made with HuggingFace**\n\n";
        $balanceMarkdown .= "**A Positive Comment:**\n".$positiveAnswer."\n\n";
        $balanceMarkdown .= "**A Negative Comment:**\n".$negativeAnswer;

        // Convierte el Markdown a HTML
        return FormattingUtil::convertMarkdownToHtml($balanceMarkdown);
    }

    private function askQuestion(string $question, string $context): string
    {
        $apiKey = env('HUGGINGFACE_API_KEY');

        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiKey",
        ])->post('https://api-inference.huggingface.co/models/deepset/roberta-base-squad2', [
            'inputs' => [
                'question' => $question,
                'context' => $context,
            ],
        ]);

        return $response->json()['answer'] ?? 'No answer found.';
    }
}
