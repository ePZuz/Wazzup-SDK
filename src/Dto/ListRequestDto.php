<?php

namespace Foxtes\WazzupDriver\Dto;

use Foxtes\WazzupDriver\Interfaces\WazzupItemDtoInterface;
use Foxtes\WazzupDriver\Interfaces\WazzupRequestDtoInterface;

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