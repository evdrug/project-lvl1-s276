<?php

namespace BrainGames\Core;

use function cli\line;
use function cli\prompt;

const COUNT_QUESTIONS = 3;

function game($func)
{
    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        ['question' => $question, 'answer' => $answer] = $func();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer === $answer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
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
