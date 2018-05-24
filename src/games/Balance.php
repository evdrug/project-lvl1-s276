<?php

namespace BrainGames\Games\Balance;

use BrainGames\Core;

const RANDOM_NUM_MIN = 10;
const RANDOM_NUM_MAX= 9999;
const DESCRIPTION = 'Balance the given number.';

function run()
{
    $quizBalance = function () {
        $question = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $answer = normalizeNumb($question);

        return ['question' => $question, 'answer' => $answer];
    };

    Core\runGame(DESCRIPTION, $quizBalance);
}

function normalizeNumb($number)
{
    $numberToString = (string)$number;
    $symbolsCount = strlen($numberToString);
    $sumOfNumber = array_sum(str_split($numberToString));
    $integerNumber = floor($sumOfNumber / $symbolsCount);
    $remain = $sumOfNumber % $symbolsCount;
    $result = [];

    for ($i = 0; $i < $symbolsCount; $i++) {
        if ($remain > 0) {
            $result[] = $integerNumber + 1;
            $remain--;
            continue;
        }
        $result[] = $integerNumber;
    }

    sort($result);
    return join($result);
}
