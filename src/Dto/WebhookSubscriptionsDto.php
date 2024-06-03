<?php

namespace Epzuz\WazzupSdk\Dto;

class WebhookSubscriptionsDto
{
    public bool $messagesAndStatuses = false;

    public bool $contactsAndDealsCreation = false;

    public bool $channelsUpdates = false;

    public bool $templateStatuses = false;
}