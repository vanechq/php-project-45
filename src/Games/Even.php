<?php

namespace BrainGames\Games\Even;

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
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 1; $i <= 3; $i++) {
        $num = rand(0, 100);
        line("Question: $num");
        $result = getAnswer($num);
        $answer = prompt('Your answer');
        if ($answer === "$result") {
            line('Correct!');
        } elseif ($answer !== "$result") {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'. \nLet's try again, $name!");
            return;
        }
    }
    line("Congratulations, $name!");
}
