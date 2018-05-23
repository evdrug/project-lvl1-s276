<?php

namespace BrainGames\Games\Balance;

use BrainGames\Core;

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

    Core\runGame(CONDITIONS, $quizBalance);
}

function normalizeNumb($arrQuestion)
{
    sort($arrQuestion);
    $countArr = count($arrQuestion) - 1;

    if ($arrQuestion[0] + 1 >= $arrQuestion[$countArr]) {
        return $arrQuestion;
    }

    $arrQuestion[$countArr] = $arrQuestion[$countArr] - 1;
    $arrQuestion[0] = $arrQuestion[0] + 1;
    return normalizeNumb($arrQuestion);
}
