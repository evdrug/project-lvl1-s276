<?php

namespace BrainGames\Games\Prime;

use BrainGames\Functions;

const RANDOM_NUM_MIN = 1;
const RANDOM_NUM_MAX= 100;
const CONDITIONS = 'Answer "yes" if prime number otherwise answer "no".';

function run()
{
    $quizPrime = function () {
        $number = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $answer = isPrime($number) ? 'yes' : 'no';

        return ['question' => $number, 'answer' => $answer];
    };

    Functions\runGame(CONDITIONS, $quizPrime);
}

function isPrime($numb)
{
    if ($numb <= 1) {
        return false;
    }

    for ($i = 2; $i < $numb / 2; $i++) {
        if ($numb % $i === 0) {
            return false;
        }
    }

    return true;
}
