<?php

namespace BrainGames\Games\Prime;

use BrainGames\Functions;

const RANDOM_NUM_MIN = 1;
const RANDOM_NUM_MAX= 100;
const CONDITIONS = 'Answer "yes" if prime number otherwise answer "no".';

function run()
{
    $quizPrime = function () {
        $question = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);


        return ['question' => $question, 'answer' => getAnswer($question)];
    };

    Functions\runGame(CONDITIONS, $quizPrime);
}

function getAnswer($question)
{
    return isPrime($question) ? 'yes' : 'no';
}

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
