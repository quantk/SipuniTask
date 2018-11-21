<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: quantick
 * Date: 21.11.2018
 * Time: 21:32
 */

namespace App\TextSorter;


/**
 * Class TextSorter
 * @package App\TextSorter
 */
final class TextSorter implements TextSorterInterface
{
    /**
     * @param string $line
     * @return string
     */
    public function sort(string $line): string
    {
        $words = \explode(' ', $line);
        $lineResult = [];
        foreach ($words as $word) {
            $letters = $this->mbStringToArray($word);
            \sort($letters);
            $lineResult[] = \implode('', $letters);
        }

        $resultLine = \implode(' ', $lineResult);

        return $resultLine;
    }

    /**
     * @param string $string
     * @return array
     */
    private function mbStringToArray(string $string): array
    {
        $strlen = mb_strlen($string);
        $array = [];
        while ($strlen) {
            $array[] = mb_substr($string, 0, 1, "UTF-8");
            $string = mb_substr($string, 1, $strlen, "UTF-8");
            $strlen = mb_strlen($string);
        }
        return $array;
    }
}