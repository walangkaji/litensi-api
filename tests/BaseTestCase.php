<?php

namespace walangkaji\LitensiAPITests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use walangkaji\LitensiAPI\Litensi;

class BaseTestCase extends TestCase
{
    public function litensi($apiId = 111, $apiKey = 'test-api-key', $proxy = '', string $mockResponse = ''): Litensi
    {
        $litensi = new Litensi($apiId, $apiKey, $proxy);

        if (!empty($mockResponse)) {
            $mock         = new MockHandler([new Response(200, [], $mockResponse)]);
            $handlerStack = HandlerStack::create($mock);
            $litensi->client()->addOption('handler', $handlerStack);
        }

        return $litensi;
    }
}
