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

function normalizeNumb($question)
{
    $iter = function ($items) use (&$iter) {
        sort($items);
        $countItems = count($items) - 1;

        if ($items[0] + 1 >= $items[$countItems]) {
            return $items;
        }

        $items[$countItems] = $items[$countItems] - 1;
        $items[0] = $items[0] + 1;
        return $iter($items);
    };

    return join($iter(str_split($question)));
}
