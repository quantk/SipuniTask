<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: quantick
 * Date: 21.11.2018
 * Time: 21:31
 */

namespace App\TextSorter;


/**
 * Interface TextSorterInterface
 * @package App\TextSorter
 */
interface TextSorterInterface
{
    /**
     * @param string $line
     * @return string
     */
    public function sort(string $line): string;
}