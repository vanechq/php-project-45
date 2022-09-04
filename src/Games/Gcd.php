<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;

function gcd(int $a, int $b): int
{
    do {
        $a > $b ? $a %= $b : $b %= $a;
        $result = $a + $b;
    } while ($a !== 0 && $b !== 0);
    return $result;
}

function play(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line("Find the greatest common divisor of given numbers.");
    for ($i = 1; $i <= 3; $i++) {
        $a = rand(0, 100);
        $b = rand(0, 100);
        $result = gcd($a, $b);
        line("Question: {$a} {$b}");
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
