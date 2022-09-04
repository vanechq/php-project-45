<?php

namespace Braingames\Games\Progression;

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
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line("What number is missing in the progression?");
    for ($i = 1; $i <= 3; $i++) {
        $start = rand(0, 20);
        $step = rand(0, 20);
        $length = rand(5, 15);
        $progression = generateProgression($start, $step, $length);
        $hiddenIndex = array_rand($progression, 1);
        $result = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';
        $question = implode(' ', $progression);
        line("Question: $question");
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
