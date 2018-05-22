<?php

namespace BrainGames\Balance;

use BrainGames\Functions;
use function cli\line;

const COUNT_QUESTIONS = 3;
const RANDOM_NUM_MIN = 10;
const RANDOM_NUM_MAX= 9999;

function run()
{
    $name = Functions\welcome('Balance the given number.');
    $result = Functions\round(COUNT_QUESTIONS, function () {
        return quizBalance();
    });

    return $result ? line("Congratulations, %s!", $name) : line("Let's try again, %s!", $name);
}

function quizBalance()
{
    $question = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
    $arrQuestion = str_split($question);
    $answer = join(normalizeNumb($arrQuestion));

    return ['question' => $question, 'answer' => $answer];
}

function normalizeNumb($arr)
{
    sort($arr);
    $countArr = count($arr) -1;

    if ($arr[0] + 1 >= $arr[$countArr]) {
        return $arr;
    }

    $arr[$countArr] = $arr[$countArr] - 1;
    $arr[0] = $arr[0] + 1;
    return normalizeNumb($arr);
}
