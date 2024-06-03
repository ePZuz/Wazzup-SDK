<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupRequestDtoInterface;

class IFrameRequestDto implements WazzupRequestDtoInterface
{
    public string $userId;
    public string $userName;
    public string $scope = 'global';
    public ?IFrameOptionsDto $options = null;
    public ?IFrameFilterDto $filter = null;

    public function toArray(): array
    {
        $array = [
            'user'    => [
                'id'   => $this->userId ?? null,
                'name' => $this->userName ?? null,
            ],
            'scope'   => $this->scope,
        ];
        if ($this->options !== null) {
            $array['options'] = $this->options;
        }
        if ($this->filter !== null) {
            $array['filter'] = $this->filter;
        }
        return $array;
    }
}