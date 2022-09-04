<?php

namespace BrainGames\Games\Prime;

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
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 1; $i <= 3; $i++) {
        $num = rand(2, 20);
        line("Question: {$num}");
        $result = getAnswer($num);
        $answer = prompt('Your answer');
        if ($answer === "{$result}") {
            line('Correct!');
        } elseif ($answer !== "{$result}") {
            line("'$answer' is wrong answer ;(. Correct answer was \"{$result}\". \nLet's try again, $name");
            return;
        }
    }
    line("Congratulations, $name!");
}
