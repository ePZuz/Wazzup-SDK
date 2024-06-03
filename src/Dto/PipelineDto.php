<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupItemDtoInterface;
use Epzuz\WazzupSdk\Interfaces\WazzupRequestDtoInterface;

class PipelineDto implements WazzupItemDtoInterface
{
    public string $id;
    public string $name;
    public array $stages = [];

    public function toArray(): array
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'stages' => $this->stages,
        ];
    }

    public static function createFromWazzup(array $data): PipelineDto
    {
        $self = new self();
        $self->id = $data['id'];
        $self->name = $data['name'];
        $self->stages = $data['stages'];
        return $self;
    }
}