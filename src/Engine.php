<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame(string $link, callable $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line($link);
    for ($countRound = 1; $countRound <= 3; $countRound++) {
        [$question, $answer] = $gameData();
        line("Question: {$question}");
        $playerAnswer = prompt('Your answer');
        if ($playerAnswer === "$answer") {
            line('Correct!');
        } elseif ($playerAnswer !== "$answer") {
            line("'$playerAnswer' is wrong answer ;(. Correct answer was '$answer'. \nLet's try again, $name!");
            return;
        }
    }
    line("Congratulations, $name!");
}
