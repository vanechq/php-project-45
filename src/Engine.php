<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function runGame(string $description, callable $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line($description);
    for ($correctAnswer = 1; $correctAnswer <= ROUND_COUNT; $correctAnswer++) {
        [$question, $answer] = $gameData();
        line("Question: {$question}");
        $playerAnswer = prompt('Your answer');
        if ($playerAnswer === $answer) {
            line('Correct!');
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$answer}'. \nLet's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
