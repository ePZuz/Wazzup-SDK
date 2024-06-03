<?php

namespace Epzuz\WazzupSdk\Modules;

use Epzuz\WazzupSdk\Http\Api;

class Counters extends WazzupModule
{
    protected string $baseUrl = 'https://integrations.wazzup24.com/counters/ws_host/api_v3/';

    private string $authToken;

    public function __construct(string $authToken, Api $api)
    {
        parent::__construct($api);
        $this->authToken = $authToken;
    }

    public function getUnread(): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->request('GET', $this->baseUrl . $this->authToken);
    }


}