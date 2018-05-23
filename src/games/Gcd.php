<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Core;

const RANDOM_NUM_MIN = 0;
const RANDOM_NUM_MAX= 100;
const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run()
{
    $quizGcd = function () {
        $number1 = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $number2 = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);

        $gcd = function ($number1, $number2) {
            while ($number1 != $number2)
            {
                if ($number1 > $number2) $number1 =  $number1 - $number2;
                else $number2 = $number2 - $number1;
            }
            return $number2;
        };

        $question = "{$number1} {$number2}";
        $answer = $gcd($number1, $number2);

        return ['question' => $question, 'answer' => (string)$answer];
    };

    Core\runGame(DESCRIPTION, $quizGcd);
}
