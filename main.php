<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: quantick
 * Date: 21.11.2018
 * Time: 21:22
 */

use App\Reader\Reader;
use App\TextSorter\TextSorter;


require_once __DIR__ . '/vendor/autoload.php';

$reader = new Reader();

try {
    $textSorter = new TextSorter();
    $reader->open('./text.txt');

    foreach ($reader->getLines() as $line) {
        echo $textSorter->sort($line) . PHP_EOL;
    }
} catch (\Throwable $e) {
    $reader->close();
    throw $e;
}
