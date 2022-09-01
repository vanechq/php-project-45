<?php

namespace BrainGames\Calculate;

use function cli\line;
use function cli\prompt;

function calculate(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('What is the result of the expression?');
    for ($i = 1; $i <= 3; $i++) {
        $operators = ['+','-','*'];
        $index = array_rand($operators, 1);
        $a = rand(0, 10);
        $b = rand(0, 10);
        $operation = $operators[$index];
        $result = 0;
        switch ($operation) {
            case '*':
                $result = $a * $b;
                break;
            case '+':
                $result = $a + $b;
                break;
            case '-':
                $result = $a - $b;
                break;
        }
        $answer = prompt("Question: $a $operation $b");
        if ($answer === "$result") {
            line('Correct!');
        } elseif ($answer !== "$result") {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'. \n Let's try again, $name");
            return;
        }
    }
    line("Congratulations, $name!");
}
