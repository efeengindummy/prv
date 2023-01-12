<?php

namespace App\Service\Converter;

use SimpleXMLElement;

class XmlConverter implements FileConverterInterface
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

        $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><root></root>");
        $this->toXml($resultArray, $xml);
        return $xml->asXML();

    }

    /**
     * @param $array
     * @param $xml
     * @return void
     */
    private function toXml($array, &$xml)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $node = $xml->addChild("$key");
                    $this->toXml($value, $node);
                } else {
                    $this->toXml($value, $xml);
                }
            } else {
                $xml->addChild("$key", "$value");
            }
        }
    }
}