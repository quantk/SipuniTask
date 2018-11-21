<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: quantick
 * Date: 21.11.2018
 * Time: 21:23
 */

namespace App\Reader;


/**
 * Interface ReaderInterface
 * @package App\Reader
 */
interface ReaderInterface
{
    /**
     * @param string $file
     * @param string $mode
     * @return void
     */
    public function open(string $file, $mode = 'rb'): void;

    /**
     * @return \Generator
     */
    public function getLines(): \Generator;

    /**
     * @return void
     */
    public function close(): void;
}