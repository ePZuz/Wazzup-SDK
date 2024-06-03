<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Dto\ListRequestDto;
use Epzuz\WazzupSdk\Dto\PipelineDto;
use Epzuz\WazzupSdk\Dto\PipelinesRequestDto;

class Pipelines extends WazzupModule
{
    protected const API_POINT = 'pipelines/';

    public function getList(): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->get(self::API_POINT);
    }

    public function store(ListRequestDto $dto): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->post(self::API_POINT, $dto);
    }
}