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
        $this->file = \fopen($file, $mode);
    }

    /**
     * @return mixed
     */
    public function getFileResource()
    {
        return $this->file;
    }

    public function close(): void
    {
        if (null !== $this->file) {
            \fclose($this->file);
            $this->file = null;
        }
    }

    public function getLines(): \Generator
    {
        while (($line = fgets($this->file)) !== false)
            yield rtrim($line, "\r\n");
    }
}