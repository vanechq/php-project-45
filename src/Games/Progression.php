<?php

namespace Braingames\Games\Progression;

use function BrainGames\Engine\runGame;
use function cli\line;
use function cli\prompt;

function generateProgression(int $start, int $step, int $length): mixed
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function play(): void
{
    $link = "What number is missing in the progression?";
    $gameData = function () {
        $start = rand(0, 20);
        $step = rand(0, 20);
        $length = rand(5, 15);
        $progression = generateProgression($start, $step, $length);
        $hiddenIndex = array_rand($progression, 1);
        $answer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';
        $question = implode(' ', $progression);
        return [$question, $answer];
    };
    runGame($link, $gameData);
}
