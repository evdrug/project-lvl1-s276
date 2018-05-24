<?php

namespace BrainGames\Core;

use function cli\line;
use function cli\prompt;

const COUNT_QUESTIONS = 3;

function game($func)
{
    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $result = $func();
        line("Question: %s", $result['question']);
        $answer = prompt('Your answer');

        if ($answer === $result['answer']) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $result['answer']);
            return false;
        }
    }
    return true;
}

function runGame($conditions, $data)
{
    line('Welcome to the Brain Game!');
    line($conditions. PHP_EOL);

    $name = prompt('May I have your name?');
    line("Hello, %s!". PHP_EOL, $name);

    game($data) ? line("Congratulations, %s!", $name) : line("Let's try again, %s!", $name);
}
