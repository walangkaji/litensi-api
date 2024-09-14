<?php

namespace walangkaji\LitensiAPITests;

use ManCurl\Client;
use walangkaji\LitensiAPI\Exception\LitensiException;
use walangkaji\LitensiAPI\Services\MailService;
use walangkaji\LitensiAPI\Services\SmsService;
use walangkaji\LitensiAPI\Services\SocialMediaService;

class LitensiTest extends BaseTestCase
{
    public function test_throws_empty_api_id(): void
    {
        $this->expectException(LitensiException::class);
        $this->expectExceptionMessage('API ID or API Key can\'t empty');

        $this->litensi(apiId: 0);
    }

    public function test_throws_empty_api_key(): void
    {
        $this->expectException(LitensiException::class);
        $this->expectExceptionMessage('API ID or API Key can\'t empty');

        $this->litensi(apiKey: '');
    }

    public function test_litensi_client()
    {
        $this->assertInstanceOf(Client::class, $this->litensi()->client());
    }

    public function test_litensi_request()
    {
        $request = $this->litensi()->request('https://example.com');
        $this->assertSame([
            'form_params' => [
                'api_id'  => 111,
                'api_key' => 'test-api-key',
            ],
        ], $request->getOptions());
    }

    public function test_litensi_request_with_proxy()
    {
        $litensi = $this->litensi(proxy: '127.0.0.1:8888');
        $request = $litensi->request('https://example.com');
        $this->assertSame([
            'proxy' => '127.0.0.1:8888',
        ], $litensi->client()->getClientOptions());
    }

    public function test_profile()
    {
        $success = '{"success":true,"data":{"username":"litensi","full_name":"Litensi","balance":"99593.04"}}';
        $request = $this->litensi(mockResponse: $success)->profile();
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->profile();
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_socialMedia()
    {
        $this->assertInstanceOf(SocialMediaService::class, $this->litensi()->socialMedia());
    }

    public function test_sms()
    {
        $this->assertInstanceOf(SmsService::class, $this->litensi()->sms());
    }

    public function test_mail()
    {
        $this->assertInstanceOf(MailService::class, $this->litensi()->mail());
    }
}
