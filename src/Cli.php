<?php
/**
 * Created by PhpStorm.
 * User: E.Druzyakin
 * Date: 21.05.18
 * Time: 12:15
 */
namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
