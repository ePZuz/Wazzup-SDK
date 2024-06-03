<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Http\Api;

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