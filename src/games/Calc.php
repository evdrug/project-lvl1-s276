<?php

namespace BrainGames\Calc;

use BrainGames\Functions;
use function cli\line;

const COUNT_QUESTIONS = 3;
const RANDOM_NUM_MIN = 1;
const RANDOM_NUM_MAX= 10;

function run()
{
    $name = Functions\welcome('What is the result of the expression?');
    $result = Functions\round(COUNT_QUESTIONS, function () {
        return quizCalc();
    });

    return $result ? line("Congratulations, %s!", $name) : line("Let's try again, %s!", $name);
}

function quizCalc()
{
    $number1 = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
    $number2 = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
    $operators = ['+', '-', '*'];
    $operation = $operators[rand(0, count($operators)-1)];

    $question = '';
    $answer = '';

    switch ($operation) {
        case '+':
            $question = "{$number1} + {$number2}";
            $answer = $number1 + $number2;
            break;
        case '-':
            $question = "{$number1} - {$number2}";
            $answer = $number1 - $number2;
            break;
        case '*':
            $question = "{$number1} * {$number2}";
            $answer = $number1 * $number2;
            break;
    }

    return ['question' => $question, 'answer' => $answer];
}
