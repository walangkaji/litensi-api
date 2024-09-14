<?php

namespace walangkaji\LitensiAPI;

use ManCurl\Response;
use ManCurl\ResponseInterface;

/**
 * Handling the response object,
 * so we don't need write a lot of code in response mapper class
 */
class ResponseHandler implements ResponseInterface
{
    public function __construct(private Response $response)
    {
    }

    /**
     * Get rasponse as array calling after `handleError()`,
     * we can use this if the response doesn't have `data` key
     */
    public function getArrayResponse(): array
    {
        return $this->toArray($this->response->getRawResponse());
    }

    /**
     * Get raw response
     */
    public function getRawResponse(): string
    {
        return $this->response->getRawResponse();
    }

    /**
     * Get the array
     *
     * @psalm-suppress MixedInferredReturnType
     * @psalm-suppress MixedReturnStatement
     */
    private function toArray(string|object|array $data): array
    {
        if (\is_array($data) || \is_object($data)) {
            return json_decode(json_encode($data), true); // @phpstan-ignore-line
        }

        /** @var array */
        $decoded = json_decode($data, true);

        if (\JSON_ERROR_NONE === json_last_error()) {
            return $decoded;
        }

        // If it's not valid JSON, treat it as a string in an array
        return [$data];
    }
}
