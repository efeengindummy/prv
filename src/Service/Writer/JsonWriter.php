<?php

namespace App\Service\Writer;

class JsonWriter extends FileWriter
{

    /**
     * @return string
     */
    public function getExtension()
    {
        return 'json';
    }
}