<?php

namespace App\Service\Reader;

use App\Service\FileReaderInterface;

class CsvReader implements FileReaderInterface
{
    /**
     * @var array
     */
    public $contents = [];

    /**
     * @param $filename
     * @param $seperator
     * @param $delimiter
     * @return void
     */
    public function read($filename, $seperator = ',', $delimiter = "\n")
    {
        $contents = explode($delimiter, file_get_contents($filename));
        array_pop($contents);

        foreach ($contents as  $singleRow) {
            $this->contents[] = explode($seperator, $singleRow);
        }
    }
}