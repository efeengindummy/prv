<?php

namespace App\Service;

interface FileReaderInterface
{
    public function read(string $filename);

}