<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;
use function cli\line;
use function cli\prompt;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function getAnswer(int $question): string
{
    return isEven($question) ? 'yes' : 'no';
}

function play(): void
{
    $link = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = function () {
        $num = rand(0, 100);
        $question = "$num";
        $answer = getAnswer($num);
        return [$question, $answer];
    };
    runGame($link, $gameData);
}
