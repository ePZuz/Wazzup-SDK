<?php

namespace Epzuz\WazzupSdk\Dto;

use Epzuz\WazzupSdk\Interfaces\WazzupRequestDtoInterface;

class IFrameRequestDto implements WazzupRequestDtoInterface
{
    public string $userId;
    public string $userName;
    public string $scope = 'global';
    public ?IFrameOptionsDto $options = null;
    public ?array $filter = [];

    public function toArray(): array
    {
        $result = [
            'user'    => [
                'id'   => $this->userId ?? null,
                'name' => $this->userName ?? null,
            ],
            'scope'   => $this->scope,
        ];
        if ($this->options !== null) {
            $result['options'] = $this->options;
        }
        if (!empty($this->filter)) {
            $result['filter'] = $this->filter;
        }
        return $result;
    }

    public function addFilter(IFrameFilterDto $filterDto): IFrameRequestDto
    {
        $this->filter[] = $filterDto;
        return $this;
    }
}