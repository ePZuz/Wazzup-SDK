<?php

namespace Epzuz\WazzupSdk\Service;

use Epzuz\WazzupSdk\Interfaces\WazzupItemDtoInterface;
use Epzuz\WazzupSdk\Response\WazzupResponse;

class WazzupPaginator
{
    private string $baseClass;

    private int $count = 0;

    private array $data = [];

    /**
     * @throws \Exception
     */
    public function __construct(string $baseClass)
    {
        if (!new $baseClass() instanceof WazzupItemDtoInterface) {
            throw new \Exception('Only item can be the base class of pagination');
        }
        $this->baseClass = $baseClass;
    }

    public function setResponse(WazzupResponse $response)
    {
        $body = $response->getBody();
        $this->count = $body['count'];
        foreach ($body['data'] as $data) {
            $this->data[] = $this->baseClass::createFromWazzup($data);
        }
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}