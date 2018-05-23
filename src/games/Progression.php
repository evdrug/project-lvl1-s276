<?php

namespace BrainGames\Games\Progression;

use BrainGames\Functions;

const RANDOM_NUM_MIN = 0;
const RANDOM_NUM_MAX= 100;
const CONDITIONS = 'What number is missing in this progression?';

function run()
{
    $quizProgression = function () {
        $numberStart = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $step= rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $arrQuestion  = [$numberStart];

        for ($i = 1; $i < 10; $i++) {
            $arrQuestion[] = $arrQuestion[$i - 1] + $step;
        }

        $answer = $arrQuestion[5];
        $arrQuestion[5] = '..';
        $question = join(' ', $arrQuestion);

        return ['question' => $question, 'answer' => $answer];
    };

    Functions\runGame(CONDITIONS, $quizProgression);
}
