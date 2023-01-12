<?php

namespace App\Service;

use App\Service\Converter\FileConverterInterface;
use App\Service\Writer\FileWriter;

class FileHandler implements FileHandlerInterface
{

    /**
     * @var FileReaderInterface
     */
    private $reader;
    /**
     * @var FileConverterInterface
     */
    private $converter;
    /**
     * @var
     */
    private $writer;

    /**
     * @param FileReaderInterface $reader
     * @return void
     */
    function setReader(FileReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return mixed
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * @param FileWriter $writer
     * @return void
     */
    public function setWriter(FileWriter $writer)
    {
        $this->writer = $writer;
    }

    /**
     * @param FileConverterInterface $converter
     * @return void
     */
    public function setConverter(FileConverterInterface $converter)
    {
        $this->converter = $converter;
    }

    /**
     * @param $filePath
     * @return mixed
     */
    public function handle($filePath)
    {
        $convertedContents = $this->converter->convert($this->reader->contents);
        $pathInfo = pathinfo($filePath);
        return $this->writer->write($pathInfo['dirname'] . DIRECTORY_SEPARATOR . $pathInfo['filename'], $convertedContents);
    }
}