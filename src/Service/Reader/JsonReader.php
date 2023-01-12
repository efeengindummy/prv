<?php

namespace App\Service\Reader;

use App\Service\FileReaderInterface;

class JsonReader implements FileReaderInterface
{
    /**
     * @param $filename
     * @param $assoc
     * @return mixed
     */
    public function read($filename, $assoc = true)
    {
        return json_decode(file_get_contents($filename),$assoc);
    }
}