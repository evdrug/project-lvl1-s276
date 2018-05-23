<?php

namespace BrainGames\Games\Calc;

use BrainGames\Core;

const RANDOM_NUM_MIN = 1;
const RANDOM_NUM_MAX= 100;
const DESCRIPTION = 'What is the result of the expression?';

function run()
{
    $quizCalc = function () {
        $number1 = 1;
        $number2 = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $operators = ['+', '-', '*'];
        $operation = $operators[rand(0, count($operators) - 1)];

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
        return ['question' => $question, 'answer' => (string)$answer];
    };

    Core\runGame(DESCRIPTION, $quizCalc);
}
