<?php

namespace Foxtes\WazzupDriver\Dto;


use Foxtes\WazzupDriver\Interfaces\WazzupRequestDtoInterface;

class WebhookDto implements WazzupRequestDtoInterface
{
    public ?string $webhooksUri = null;

    public ?WebhookSubscriptionsDto $subscriptions = null;

    public function __construct()
    {
        $this->subscriptions = new WebhookSubscriptionsDto();
    }

    public function toArray(): array
    {
        return [
            'webhooksUri'   => $this->webhooksUri,
            'subscriptions' => $this->subscriptions,
        ];
    }
}