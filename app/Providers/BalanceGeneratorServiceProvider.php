<?php

// Esteban

namespace App\Providers;

use App\Interfaces\BalanceGenerator;
use App\Util\BalanceGemini;
use App\Util\BalanceHuggingFace;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class BalanceGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BalanceGenerator::class, function (Application $app, array $params): BalanceGenerator {
            $type = $params['type'] ?? 'gemini';

            switch ($type) {
                case 'huggingface':
                    return new BalanceHuggingFace;
                case 'gemini':
                default:
                    return new BalanceGemini;
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
