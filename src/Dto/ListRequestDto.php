<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupItemDtoInterface;
use Epzuz\WazzupSdk\Interfaces\WazzupRequestDtoInterface;

class ListRequestDto implements WazzupRequestDtoInterface
{
    public array $items = [];

    public function push(WazzupItemDtoInterface $item): ListRequestDto
    {
        $this->items[] = $item;
        return $this;
    }

    public function toArray(): array
    {
        return $this->items;
    }

}