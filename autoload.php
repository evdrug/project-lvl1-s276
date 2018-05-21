<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 21.05.18
 * Time: 22:06
 */

$autoloadPath1 = __DIR__ . '/../../autoload.php';
$autoloadPath2 = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
