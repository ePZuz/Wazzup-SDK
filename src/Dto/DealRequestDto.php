<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupItemDtoInterface;

class DealRequestDto implements WazzupItemDtoInterface
{
    public string $id;
    public string $responsibleUserId;
    public string $name;
    public ?string $uri = null;
    public array $contacts = [];
    public bool $closed = false;

    public static function createFromWazzup(array $data): DealRequestDto
    {
        $self                    = new self();
        $self->id                = $data['id'];
        $self->responsibleUserId = $data['responsibleUserId'];
        $self->name              = $data['name'];
        $self->uri               = $data['uri'];
        $self->closed            = $data['closed'];
        return $self;
    }
}