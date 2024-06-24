<?php

namespace Foxtes\WazzupDriver\Response;

use Psr\Http\Message\ResponseInterface;

class WazzupResponse

{
    private ?array $body = null;

    private array $errors = [];

    private int $statusCode;

    /**
     * ApiResponse constructor.
     * @param ResponseInterface|null $response
     */
    public function __construct(ResponseInterface $response = null)
    {
        if ($response === null) {
            $this->statusCode = 500;
            $this->body = [];

            $this->errors[] = [
                'code' => 'internal_error',
                'message' => 'Internal Server Error'
            ];
        } else {
            $this->statusCode = $response->getStatusCode();
            $this->body = json_decode($response->getBody()->getContents(), true);

            if ($this->statusCode > 299) {
                if (isset($this->body['error'])) {
                    $this->errors[] = [
                        'code' => $this->body['error'],
                        'message' => $this->body['description']
                    ];
                } elseif (isset($this->body['errors'])) {
                    $this->errors = $this->body['errors'];
                }
            }
        }
    }

    public function isOk(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode <= 299;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}