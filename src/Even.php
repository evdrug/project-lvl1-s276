<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 21.05.18
 * Time: 22:20
 */

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use BrainGames\Cli;

function game()
{
    $name = Cli\run();
    
    if (isResponse(quiz())) {
        line("Congratulations, %s!", $name);
    } else {
        $correct = $response['answer'] === 'yes' ? 'no' : 'yes';
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $response['answer'], $correct);
        line("Let's try again, %s!", $name);
    }
}

function quiz()
{
    $count = 3;
    while ($count > 0) {
        $response = question();

        if (isEven($response['number']) && $response['answer'] === 'yes') {
            line('Correct!');
            $count--;
        } elseif (!isEven($response['number']) && $response['answer'] === 'no') {
            line('Correct!');
            $count--;
        } else {
            $count = -1;
        }
    }
    return $count;
}

function question()
{
    $number = rand(1, 100);
    $msg = "Question: {$number}";
    line($msg);
    $answer = prompt('Your answer');
    return ['number' => $number, 'answer' => $answer];
}

function isEven(int $number)
{
    return $number%2 === 0;
}

function isResponse(int $number)
{
    return $number === 0;
}
