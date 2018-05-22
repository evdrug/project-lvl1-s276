<?php

namespace BrainGames\Functions;

use function cli\line;
use function cli\prompt;

function welcome($str)
{
    line('Welcome to the Brain Game!');
    line($str. PHP_EOL);

    $name = prompt('May I have your name?');
    line("Hello, %s!". PHP_EOL, $name);

    return $name;
}

function question($str)
{
    line("Question: %s", $str);
    $answer = prompt('Your answer');
    return $answer;
}

function round($count, $func)
{
    for ($i = $count; $i > 0; $i--) {
        $result = $func();
        $answer = question($result['question']);
        if ($answer == $result['answer']) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $result['answer']);
            return false;
        }
    }
    return true;
}

function runGame($conditions, $count, $data)
{
    $name = welcome($conditions);
    $result = round($count, $data);

    return $result ? line("Congratulations, %s!", $name) : line("Let's try again, %s!", $name);
}
