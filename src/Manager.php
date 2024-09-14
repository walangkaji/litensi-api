<?php

namespace walangkaji\LitensiAPI;

use ManCurl\Client;
use ManCurl\Request;

class Manager
{
    private ?Client $client = null;

    /**
     * Get client
     */
    public function client(): Client
    {
        if (!$this->client instanceof Client) {
            $this->client = new Client();
        }

        return $this->client;
    }

    /**
     * Create a custom API request.
     *
     * Used internally, but can also be used by end-users if they want
     * to create completely custom API queries without modifying this library.
     */
    public function request(string $url): Request
    {
        return new Request($this->client(), $url);
    }
}
