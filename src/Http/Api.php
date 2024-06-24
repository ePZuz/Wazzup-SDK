<?php

namespace Foxtes\WazzupDriver\Http;

use Foxtes\WazzupDriver\Exceptions\RequestException;
use Foxtes\WazzupDriver\Interfaces\WazzupRequestDtoInterface;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Uri;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Api
{
    private const BASE_URL = 'https://api.wazzup24.com/v3/';

    private string $token;

    private ClientInterface $httpClient;

    public function __construct(string $token, ClientInterface $httpClient)
    {
        $this->token = $token;
        $this->httpClient = $httpClient;
    }

    /**
     * @throws RequestException
     */
    public function get(string $API_POINT): ResponseInterface
    {
        return $this->request('GET', self::BASE_URL . $API_POINT);
    }

    /**
     * @throws RequestException
     */
    public function post(string $API_POINT, WazzupRequestDtoInterface $frameRequestDto): ResponseInterface
    {
        return $this->request('POST', self::BASE_URL . $API_POINT, $frameRequestDto->toArray());
    }

    /**
     * @throws RequestException
     */
    public function patch(string $API_POINT, WazzupRequestDtoInterface $frameRequestDto): ResponseInterface
    {
        return $this->request('PATCH', self::BASE_URL . $API_POINT, $frameRequestDto->toArray());
    }

    /**
     * @throws RequestException
     */
    public function delete(string $API_POINT): ResponseInterface
    {
        return $this->request('DELETE', self::BASE_URL . $API_POINT);
    }



    protected function getToken(): string
    {
        return $this->token;
    }

    /**
     * @throws RequestException
     */
    public function request(string $type, string $url, array $params = []): ResponseInterface
    {
        $uri = new Uri($url);
        try {
            $headers = [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ];

            if (!empty($this->token)) {
                $headers['Authorization'] = 'Bearer ' . $this->getToken();
            }

            $request = new Request($type, $uri, $headers, json_encode($params));
            return $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new RequestException($e->getMessage(), (int)$e->getCode());
        } catch (\Exception $e) {
            throw new RequestException($e->getMessage(), (int)$e->getCode());
        }
    }
}