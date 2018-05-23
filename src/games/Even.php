<?php

namespace BrainGames\Games\Even;

use BrainGames\Core;

const RANDOM_NUM_MIN = 1;
const RANDOM_NUM_MAX= 100;
const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $quizEven = function () {
        $question = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);

        $isEven = function ($number) {
            return $number % 2 === 0;
        };

        $getAnswer = function ($question) use ($isEven) {
            return $isEven($question) ? 'yes' : 'no';
        };

        return ['question' => $question, 'answer' => $getAnswer($question)];
    };
    Core\runGame(DESCRIPTION, $quizEven);
}
