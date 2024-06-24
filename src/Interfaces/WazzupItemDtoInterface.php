<?php

namespace Foxtes\WazzupDriver\Interfaces;

interface WazzupItemDtoInterface
{
    public static function createFromWazzup(array $data);
}