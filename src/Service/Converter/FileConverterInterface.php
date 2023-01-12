<?php

namespace App\Service\Converter;

interface FileConverterInterface
{
    /**
     * @param $contents
     * @return string
     */
    public function convert($contents): string;

}