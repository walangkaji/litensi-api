<?php

namespace walangkaji\LitensiAPI;

use ManCurl\Client;
use ManCurl\Request;
use walangkaji\LitensiAPI\Exception\LitensiException;
use walangkaji\LitensiAPI\Response\Profile;
use walangkaji\LitensiAPI\Services\MailService;
use walangkaji\LitensiAPI\Services\SmsService;
use walangkaji\LitensiAPI\Services\SocialMediaService;

class Litensi
{
    protected ?Client $client = null;

    public function __construct(private int $apiId, private string $apiKey, private string $proxy = '')
    {
        if (0 === $apiId || empty($apiKey)) {
            throw new LitensiException('API ID or API Key can\'t empty');
        }
    }

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
        if (!empty($this->proxy)) {
            $this->client()->setProxy($this->proxy);
        }

        $request = new Request($this->client(), $url);
        $request->addPosts([
            'api_id'  => $this->apiId,
            'api_key' => $this->apiKey,
        ]);

        return $request;
    }

    /**
     * Profile API
     */
    public function profile(): Profile
    {
        return $this->request('https://litensi.id/api/profile')
            ->mapResponse(fn (ResponseHandler $r) => new Profile($r->getArrayResponse()));
    }

    /**
     * Social Media API
     */
    public function socialMedia(): SocialMediaService
    {
        return new SocialMediaService($this);
    }

    /**
     * SMS Activation API
     */
    public function sms(): SmsService
    {
        return new SmsService($this);
    }

    /**
     * Social Media API
     */
    public function mail(): MailService
    {
        return new MailService($this);
    }
}
