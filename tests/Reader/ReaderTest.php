<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: quantick
 * Date: 21.11.2018
 * Time: 22:31
 */

namespace Tests\Reader;


use App\Reader\Reader;
use App\Reader\ReaderInterface;
use PHPUnit\Framework\TestCase;

final class ReaderTest extends TestCase
{
    /**
     * @var ReaderInterface
     */
    private $reader;

    public function testFileIsClosedAfterCallClose()
    {
        $this->reader->open('./text.txt');
        static::assertNotNull($this->reader->getFileResource());
        $this->reader->close();
        static::assertNull($this->reader->getFileResource());
    }

    public function testGetLines()
    {
        $this->reader->open('./text.txt');
        $expectedLines = [
            "lemon orange banana apple",
            "лимон апельсин банан яблоко",
            "αβγαβγ αβγαβγαβγ",
        ];

        $i = 0;
        foreach ($this->reader->getLines() as $line) {
            static::assertSame($expectedLines[$i], $line);
            $i++;
        }
    }

    protected function setUp()
    {
        parent::setUp();

        $this->reader = new Reader();
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->reader->close();
    }
}