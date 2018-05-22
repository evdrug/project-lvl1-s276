<?php

namespace BrainGames\Even;

use BrainGames\Functions;

const COUNT_QUESTIONS = 3;
const RANDOM_NUM_MIN = 1;
const RANDOM_NUM_MAX= 100;
const CONDITIONS = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $quizEven = function () {
        $question = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $answer = isEven($question) ? 'yes' : 'no';

        return ['question' => $question, 'answer' => $answer];
    };
    Functions\runGame(CONDITIONS, COUNT_QUESTIONS, $quizEven);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
