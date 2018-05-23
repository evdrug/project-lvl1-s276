<?php

namespace BrainGames\Games\Progression;

use BrainGames\Core;

const RANDOM_NUM_MIN = 0;
const RANDOM_NUM_MAX= 100;
const LENGTH_OF_PROGRESSION = 10;
const DESCRIPTION = 'What number is missing in this progression?';

function run()
{
    $quizProgression = function () {
        $startNumber = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $step = rand(RANDOM_NUM_MIN, RANDOM_NUM_MAX);
        $numberInProgression = rand(1, LENGTH_OF_PROGRESSION) - 1;
        $arrQuestion  = [$startNumber];

        for ($i = 1; $i < LENGTH_OF_PROGRESSION; $i++) {
            $arrQuestion[] = $arrQuestion[$i - 1] + $step;
        }

        $answer = $arrQuestion[$numberInProgression];
        $arrQuestion[$numberInProgression] = '..';
        $question = join(' ', $arrQuestion);

        return ['question' => $question, 'answer' => $answer];
    };

    Core\runGame(DESCRIPTION, $quizProgression);
}
