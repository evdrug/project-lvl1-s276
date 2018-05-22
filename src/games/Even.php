<?php

namespace BrainGames\Even;

use BrainGames\Functions;
use function cli\line;

const COUNT_QUESTIONS = 3;
const RANDOM_NUM_MIN = 1;
const RANDOM_NUM_MAX= 100;

function run()
{
    $name = Functions\welcome('Answer "yes" if number even otherwise answer "no".');
    $result = Functions\round(COUNT_QUESTIONS, function () {
        return quizEven();
    });

    return $result ? line("Congratulations, %s!", $name) : line("Let's try again, %s!", $name);
}

function quizEven()
{
    $question = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
    $answer = isEven($question) ? 'yes' : 'no';

    return ['question' => $question, 'answer' => $answer];
}

function isEven(int $number)
{
    return $number%2 === 0;
}
