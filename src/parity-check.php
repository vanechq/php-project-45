<?php

namespace BrainGames\Parity\Check;

use function cli\line;
use function cli\prompt;

function parityCheck()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 1; $i <= 3; $i++) {
        $numbers = rand(0, 100);
        $check = ($numbers % 2 === 0);
        $answer = prompt("Question: $numbers");
        if ($answer === 'yes' && $check === true) {
            line('Correct!');
        } elseif ($answer === 'yes' && $check === false) {
            line("'yes' is wrong answer ;(. Correct answer was 'no'. \n Let's try again, $name");
            return;
        } elseif ($answer === 'no' && $check === false) {
            line('Correct!');
        } elseif ($answer === 'no' && $check === true) {
            line("'yes' is wrong answer ;(. Correct answer was 'no'. \n Let's try again, $name");
            return;
        }
    }
    line("Congratulations, $name!");
}
