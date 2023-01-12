<?php

namespace App\Service\Converter;

class JsonConverter implements FileConverterInterface
{
    /**
     * @param $contents
     * @return string
     */
    public function convert($contents): string
    {

        $keys = array_shift($contents);
        $resultArray = [];
        foreach ($contents as $singleRow) {
            foreach ($keys as $key => $value) {
                $tempArray[$value] = $singleRow[$key];
            }
            $resultArray[] = $tempArray;
        }

        return json_encode($resultArray);
    }
}