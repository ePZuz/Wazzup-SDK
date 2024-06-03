<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupItemDtoInterface;

class ContactDataDto implements WazzupItemDtoInterface
{

    public string $chatType;
    public string $chatId;
    public ?string $username = null;
    public ?string $phone = null;

    public static function createFromWazzup(array $data): ContactDataDto
    {
        $self           = new self();
        $self->chatType = $data['chatType'];
        $self->chatId   = $data['chatId'];
        $self->username = $data['username'];
        $self->phone    = $data['phone'];
        return $self;
    }
}