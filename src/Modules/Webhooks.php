<?php

namespace Foxtes\WazzupDriver\Modules;

use Foxtes\WazzupDriver\Dto\WebhookDto;
use Foxtes\WazzupDriver\Exceptions\RequestException;

class Webhooks extends WazzupModule
{
    protected const API_POINT = 'webhooks/';

    /**
     * @throws RequestException
     */
    public function patch(WebhookDto $dto): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->patch(self::API_POINT, $dto);
    }

    /**
     * @throws RequestException
     */
    public function get(): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->get(self::API_POINT);
    }
}