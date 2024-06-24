<?php

namespace Foxtes\WazzupDriver\Modules;

use Foxtes\WazzupDriver\Http\Api;

abstract class WazzupModule
{

    protected const API_POINT = '';

    protected Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    protected function getApi(): Api
    {
        return $this->api;
    }
}