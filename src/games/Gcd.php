<?php

namespace BrainGames\Gcd;

use BrainGames\Functions;
use function cli\line;

const COUNT_QUESTIONS = 3;
const RANDOM_NUM_MIN = 0;
const RANDOM_NUM_MAX= 100;

function run()
{
    $name = Functions\welcome('Find the greatest common divisor of given numbers.');
    $result = Functions\round(COUNT_QUESTIONS, function () {
        return quizGcd();
    });

    return $result ? line("Congratulations, %s!", $name) : line("Let's try again, %s!", $name);
}

function quizGcd()
{
    $number1 = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
    $number2 = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);

    $question = "{$number1} {$number2}";
    $answer = gcd($number1, $number2);

    return ['question' => $question, 'answer' => $answer];
}

function gcd($num1, $num2)
{
    $num1 = abs($num1);
    $num2 = abs($num2);

    $numMax = max($num1, $num2);
    $numMin = min($num1, $num2);

    if ($numMin === 0) {
        if ($numMax === 0) {
            return 1;
        }
        return $numMax;
    }

    if ($numMax % $numMin !== 0) {
        for ($i = floor($numMin/2); $i > 0; $i--) {
            if ($numMin % $i === 0 && $numMax % $i === 0) {
                return $i;
            }
        }
    } else {
        return $numMin;
    }
}
