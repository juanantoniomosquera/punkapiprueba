<?php

namespace App\Service\Punk;


/**
 * Class Punk
 * @package App\Service\Punk
 */
class Punk
{
    const URL_PUNK_API = 'https://api.punkapi.com/v2/beers';

    public function getBeersByFood($food, $filters, $utilService)
    {
        $result = [];

        $data = $utilService->callGet(self::URL_PUNK_API . '?food=' . $food, []);

        if ($data) {
            foreach ($data as $beer) {
                $result[] = !empty($filters) ? $this->getDataWithFilters($beer, $filters) : $beer;
            }
        }

        return $result;
    }

    private function getDataWithFilters($data, $filters)
    {
        foreach ($filters as $filter) {
            if (!empty($data[$filter])) {
                $resultIntermediate[$filter] = $data[$filter];
            }
        }

        return $resultIntermediate;
    }
}
