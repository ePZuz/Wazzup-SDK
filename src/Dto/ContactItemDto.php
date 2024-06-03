<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupItemDtoInterface;

class ContactItemDto implements WazzupItemDtoInterface
{
    public string $id;
    public string $name;
    public string $responsibleUserId;
    public array $contactData = [];
    public ?string $uri = null;

    public static function createFromWazzup(array $data): ContactItemDto
    {
        $self                    = new self();
        $self->id                = $data['id'];
        $self->name              = $data['name'];
        $self->responsibleUserId = $data['responsibleUserId'];
        foreach ($data['contactData'] as $contactData) {
            $self->contactData[] = ContactDataDto::createFromWazzup($contactData);
        }
        return $self;
    }
}