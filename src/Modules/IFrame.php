<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Dto\IFrameRequestDto;
use Epzuz\WazzupSdk\Exceptions\RequestException;

class IFrame extends WazzupModule
{
    protected const API_POINT = 'iframe/';

    /**
     * @throws RequestException
     */
    public function getFrame(IFrameRequestDto $frameRequestDto): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->post(self::API_POINT, $frameRequestDto);
    }
}