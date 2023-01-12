<?php

namespace App\Service\Filter;

class JsonFilter
{
    /**
     * @param $contents
     * @param $params
     * @return array
     */
    public function filter($contents, $params): array
    {
        $resultArray = [];
        foreach ($contents as $singleRow) {
            foreach ($singleRow as $key => $value) {
                if (($key == 'name' && !empty($params['name']) && $singleRow[$key] == $params['name']) ||
                    ($key == 'discount_percentage' && !empty($params['discount_percentage']) &&
                        $singleRow[$key] == $params['discount_percentage'])
                ) {
                    $resultArray[] = $singleRow;
                    continue 2;
                }
            }
        }
        return $resultArray;
    }
}