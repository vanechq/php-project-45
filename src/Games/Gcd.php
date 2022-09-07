<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;
use function cli\line;
use function cli\prompt;

function gcd(int $a, int $b): int
{
    do {
        $a > $b ? $a %= $b : $b %= $a;
        $result = $a + $b;
    } while ($a != 0 && $b != 0);
    return $result;
}

function play(): void
{
    $link = 'Find the greatest common divisor of given numbers.';
    $gameData = function () {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $question = "$a $b";
        $answer = gcd($a, $b);
        return [$question,$answer];
    };
    runGame($link, $gameData);
}
