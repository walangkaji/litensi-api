<?php

namespace walangkaji\LitensiAPI;

use ManCurl\Request;
use Spatie\DataTransferObject\DataTransferObject;

class LitensiServiceManager
{
    public function __construct(private Litensi $litensi)
    {
    }

    /**
     * Litensi class instance
     */
    protected function litensi(): Litensi
    {
        return $this->litensi;
    }

    /**
     * Create a custom API request.
     */
    protected function request(string $url): Request
    {
        return $this->litensi()->request($url);
    }

    /**
     * Returns a Closure that maps a response to a specific DataTransferObject class.
     *
     * @template T of DataTransferObject
     *
     * @param class-string<T> $className the class name of the DataTransferObject to instantiate
     *
     * @return \Closure(ResponseHandler): T
     *
     * @psalm-suppress UnsafeInstantiation
     */
    protected function mapTo(string $className): \Closure
    {
        return function (ResponseHandler $r) use ($className) {
            return new $className($r->getArrayResponse());
        };
    }
}
