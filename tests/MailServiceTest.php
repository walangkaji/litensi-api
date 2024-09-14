<?php

namespace walangkaji\LitensiAPITests;

class MailServiceTest extends BaseTestCase
{
    public function test_mail_prices()
    {
        $success = '{"success":true,"data":[{"zone":"hotmail.com","price":180,"stock":1382237},{"zone":"outlook.com","price":180,"stock":310105}]}';
        $request = $this->litensi(mockResponse: $success)->mail()->prices('test');
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->mail()->prices('test');
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_mail_order()
    {
        $success = '{"success":true,"data":{"order_id":5,"zone":"gmail.com","site":"tiktok.com","price":480,"email":"befasyza2017@gmail.com","expired_at":"2024-02-24 01:05:49","status":"WAITING"}}';
        $request = $this->litensi(mockResponse: $success)->mail()->order('test', 'test');
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->mail()->order('test', 'test');
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_mail_getStatus()
    {
        $success = '{"success":true,"data":{"order_id":5,"email":"befasyza2017@gmail.com","message":"","full_message":"","status":"WAITING"}}';
        $request = $this->litensi(mockResponse: $success)->mail()->getStatus(1);
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->mail()->getStatus(1);
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_mail_setStatus()
    {
        $success = '{"success":true,"data":{"order_id":5,"email":"befasyza2017@gmail.com","status":"CANCELED"}}';
        $request = $this->litensi(mockResponse: $success)->mail()->setStatus(1, 'test');
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->mail()->setStatus(1, 'test');
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_mail_reOrder()
    {
        $success = '{"success":true,"data":{"order_id":5,"email":"befasyza2017@gmail.com","expired_at":"2024-02-24 01:54:30"}}';
        $request = $this->litensi(mockResponse: $success)->mail()->reOrder('test', 'test');
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->mail()->reOrder('test', 'test');
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }
}
