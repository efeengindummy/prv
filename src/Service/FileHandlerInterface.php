<?php

namespace App\Service;

use App\Service\Converter\FileConverterInterface;
use App\Service\Writer\FileWriter;

interface FileHandlerInterface
{

    /**
     * @param FileReaderInterface $reader
     */
    public function setReader(FileReaderInterface $reader);

    /**
     * @param FileConverterInterface $converter
     */
    public function setConverter(FileConverterInterface $converter);

    /**
     * @param FileWriter $writer
     */
    public function setWriter(FileWriter $writer);
}