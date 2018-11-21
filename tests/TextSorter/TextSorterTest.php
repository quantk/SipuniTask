<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: quantick
 * Date: 21.11.2018
 * Time: 21:33
 */

namespace Tests\TextSorter;


use App\Reader\ReaderInterface;
use App\TextSorter\TextSorter;
use PHPUnit\Framework\TestCase;

final class TextSorterTest extends TestCase
{
    public function testSort()
    {
        $reader = $this->createMock(ReaderInterface::class);
        $testLines = [
            "lemon orange banana apple",
            "лимон апельсин банан яблоко",
            "αβγαβγ αβγαβγαβγ",
        ];
        $expectedLines = [
            0 => 'elmno aegnor aaabnn aelpp',
            1 => 'илмно аеилнпсь аабнн бклооя',
            2 => 'ααββγγ αααβββγγγ',
        ];
        $reader->method('getLines')->willReturnCallback(function () use ($testLines) {
            foreach ($testLines as $testLine) {
                yield rtrim($testLine, "\r\n");
            }
        });
        $sorter = new TextSorter();
        $i = 0;
        foreach ($reader->getLines() as $line) {
            $sortedLine = $sorter->sort($line);
            static::assertSame($expectedLines[$i], $sortedLine);
            $i++;
        }
    }
}