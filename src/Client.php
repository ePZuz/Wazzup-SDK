<?php

namespace Epzuz\WazzupSdk;

use Epzuz\WazzupSdk\Modules\Channels;
use Epzuz\WazzupSdk\Modules\Contacts;
use Epzuz\WazzupSdk\Modules\Counters;
use Epzuz\WazzupSdk\Modules\Deals;
use Epzuz\WazzupSdk\Modules\IFrame;
use Epzuz\WazzupSdk\Http\Api;
use Epzuz\WazzupSdk\Modules\Messages;
use Epzuz\WazzupSdk\Modules\Pipelines;
use Epzuz\WazzupSdk\Modules\Users;
use Epzuz\WazzupSdk\Modules\Webhooks;
use Psr\Http\Client\ClientInterface;

class Client
{
    private Api $api;

    private IFrame $iframe;
    private Users $users;
    private Pipelines $pipelines;
    private Contacts $contacts;
    private Deals $deals;
    private Webhooks $webhooks;
    private Channels $channels;
    private Messages $messages;
    private Counters $counters;

    public function __construct(string $authToken, ClientInterface $client)
    {
        $this->api       = new Api($authToken, $client);
        $this->iframe    = new IFrame($this->api);
        $this->users     = new Users($this->api);
        $this->pipelines = new Pipelines($this->api);
        $this->contacts  = new Contacts($this->api);
        $this->deals     = new Deals($this->api);
        $this->webhooks  = new Webhooks($this->api);
        $this->channels  = new Channels($this->api);
        $this->messages  = new Messages($this->api);
        $this->counters  = new Counters($authToken, $this->api);

    }

    protected function getApi(): Api
    {
        return $this->api;
    }

    public function iframe(): IFrame
    {
        return $this->iframe;
    }

    public function users(): Users
    {
        return $this->users;
    }

    public function pipelines(): Pipelines
    {
        return $this->pipelines;
    }

    public function contacts(): Contacts
    {
        return $this->contacts;
    }

    public function deals(): Deals
    {
        return $this->deals;
    }

    public function webhooks(): Webhooks
    {
        return $this->webhooks;
    }

    public function channels(): Channels
    {
        return $this->channels;
    }

    public function messages(): Messages
    {
        return $this->messages;
    }

    public function counters(): Counters
    {
        return $this->counters;
    }


}