<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\runGame;
use function cli\line;
use function cli\prompt;

function calculate(int $num1, int $num2, string $operation): int
{
    return match ($operation) {
        '*' => $result = $num1 * $num2,
        '+' => $result = $num1 + $num2,
        '-' => $result = $num1 - $num2,
        default => throw new \Exception('Unexpected value'),
    };
}

function play(): void
{
    $description = 'What is the result of the expression?';
    $gameData = function () {
        $operators = ['+', '-', '*'];
        $index = array_rand($operators, 1);
        $num1 = rand(0, 25);
        $num2 = rand(0, 25);
        $operation = $operators[$index];
        $question = "{$num1} {$operation} {$num2}";
        $answer = (string)(calculate($num1, $num2, $operation));
        return [$question, $answer];
    };
    runGame($description, $gameData);
}
