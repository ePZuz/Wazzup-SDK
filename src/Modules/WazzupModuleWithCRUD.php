<?php

namespace Foxtes\WazzupDriver\Modules;

use Foxtes\WazzupDriver\Dto\ListRequestDto;
use Foxtes\WazzupDriver\Exceptions\RequestException;

class WazzupModuleWithCRUD extends WazzupModule
{
    /**
     * @throws RequestException
     */
    public function getList(): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->get(static::API_POINT);
    }

    /**
     * @throws RequestException
     */
    public function getById($id): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->get(static::API_POINT . $id);
    }

    /**
     * @throws RequestException
     */
    public function add(ListRequestDto $list): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->post(static::API_POINT, $list);
    }

    /**
     * @throws RequestException
     */
    public function delete(string $id): \Psr\Http\Message\ResponseInterface
    {
        return $this->getApi()->delete(static::API_POINT . $id);
    }

    public function bulkDelete(array $ids): \Psr\Http\Message\ResponseInterface
    {
        $request = new ListRequestDto();
        foreach ($ids as $id) {
            $request->push($id);
        }
        return $this->getApi()->patch(static::API_POINT . 'bulk_delete', $request);
    }

}