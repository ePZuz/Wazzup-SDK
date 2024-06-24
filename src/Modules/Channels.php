<?php

namespace Foxtes\WazzupDriver\Modules;

use Foxtes\WazzupDriver\Exceptions\RequestException;

class Channels extends WazzupModule
{
    protected const API_POINT = 'channels/';

    /**
     * @throws RequestException
     */
    public function getList(): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->get(self::API_POINT);
    }
}