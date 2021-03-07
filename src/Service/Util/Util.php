<?php

namespace App\Service\Util;

use Symfony\Component\HttpClient\HttpClient;
use Exception;
use Psr\Log\LoggerInterface;

/**
 * Class Util
 * @package App\Service\Util
 */
class Util
{
    /**
     * @var LoggerInterface $logger
     */
    protected $logger;

    /**
     * callGet
     *
     * @param  mixed $url
     * @return array
     */
    public function callGet($url)
    {
        $resultado = [];

        try {
            $client = HttpClient::create(['verify_peer' => false]);
            $resultado = $client->request('GET', $url)->toArray();
        } catch (Exception $ex) {
            $this->logger->error('[UTIL] Error en llamada GET: ' . $ex->getMessage());
        }

        return $resultado;
    }

    /**
     * @required
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
