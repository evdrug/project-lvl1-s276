<?php

namespace BrainGames\Games\Balance;

use BrainGames\Functions;

const RANDOM_NUM_MIN = 10;
const RANDOM_NUM_MAX= 9999;
const CONDITIONS = 'Balance the given number.';

function run()
{
    $quizBalance = function () {
        $question = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $arrQuestion = str_split($question);
        $answer = join(normalizeNumb($arrQuestion));

        return ['question' => $question, 'answer' => $answer];
    };

    Functions\runGame(CONDITIONS, $quizBalance);
}

function normalizeNumb($arr)
{
    sort($arr);
    $countArr = count($arr) - 1;

    if ($arr[0] + 1 >= $arr[$countArr]) {
        return $arr;
    }

    $arr[$countArr] = $arr[$countArr] - 1;
    $arr[0] = $arr[0] + 1;
    return normalizeNumb($arr);
}
