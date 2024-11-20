<?php

// Esteban

namespace App\Interfaces;

use app\Models\Game;

interface BalanceGenerator
{
    public function generateBalance(Game $game): string;
}
