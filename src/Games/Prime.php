<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;
use function cli\line;
use function cli\prompt;

function isPrime(int $num): bool
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    } return true;
}

function getAnswer(int $question): string
{
    return isPrime($question) ? 'yes' : 'no';
}

function play(): void
{
    $link = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = function () {
        $num = rand(2, 20);
        $question = $num;
        $answer = getAnswer($num);
        return [$question, $answer];
    };
    runGame($link, $gameData);
}
