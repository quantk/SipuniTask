<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: quantick
 * Date: 21.11.2018
 * Time: 21:25
 */

namespace App\Reader;


/**
 * Class Reader
 * @package App\Reader
 */
final class Reader implements ReaderInterface
{
    private $file;

    public function open(string $file, $mode = 'rb'): void
    {
        if (false === file_exists($file)) {
            throw new \RuntimeException(sprintf('File %s doesn\'t exists', $file));
        }
        if (null !== $this->file) {
            throw new \RuntimeException('Another file already opened');
        }
        $this->file = \fopen($file, 'rb');
    }

    public function close(): void
    {
        \fclose($this->file);
        $this->file = null;
    }

    public function getLines(): \Generator
    {
        while (($line = fgets($this->file)) !== false)
            yield rtrim($line, "\r\n");
    }
}