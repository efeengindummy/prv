<?php

namespace App\Service\Writer;

abstract class FileWriter
{
    /**
     * @param $filepath
     * @param $contents
     * @return false|int
     */
    public function write($filepath, $contents)
    {
     return   file_put_contents($filepath.'.'.$this->getExtension(),$contents);
    }
}