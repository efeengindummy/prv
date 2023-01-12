<?php

namespace App\Service\Writer;

class XmlWriter extends FileWriter
{
    /**
     * @return string
     */
    public function getExtension()
    {
        return 'xml';
    }
}