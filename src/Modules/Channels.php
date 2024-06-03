<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Exceptions\RequestException;

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