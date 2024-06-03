<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Dto\MessageRequestDto;
use Epzuz\WazzupSdk\Exceptions\RequestException;

class Messages extends WazzupModule
{
    protected const API_POINT = 'message/';

    /**
     * @throws RequestException
     */
    public function send(MessageRequestDto $dto): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->post(self::API_POINT, $dto);
    }
}