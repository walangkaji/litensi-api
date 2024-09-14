<?php

namespace walangkaji\LitensiAPITests;

class SmsServiceTest extends BaseTestCase
{
    public function test_sms_countries()
    {
        $success = '{"success":true,"data":[{"id":37,"name":"Canada","operator":"any,cellular,chatrmobile,fido,lucky,rogers,telus"},{"id":152,"name":"Chile","operator":"any,claro,entel,movistar,wom"}]}';
        $request = $this->litensi(mockResponse: $success)->sms()->countries();
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->sms()->countries();
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_sms_services()
    {
        $success = '{"success":true,"data":[{"id":300,"name":"Any other"},{"id":9,"name":"AOL"}]}';
        $request = $this->litensi(mockResponse: $success)->sms()->services();
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->sms()->services();
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_sms_operators()
    {
        $success = '{"success":true,"data":[{"country_id":37,"country_name":"Canada","operator":"any"},{"country_id":152,"country_name":"Chile","operator":"any"},{"country_id":152,"country_name":"Chile","operator":"claro"}]}';
        $request = $this->litensi(mockResponse: $success)->sms()->operators();
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->sms()->operators();
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_sms_prices()
    {
        $success = '{"success":true,"data":[{"country_id":1,"country_name":"Russia","service_id":168,"service_name":"TamTam","price":1978},{"country_id":1,"country_name":"Russia","service_id":168,"service_name":"TamTam","price":1978},{"country_id":1,"country_name":"Russia","service_id":357,"service_name":"BeeBoo","price":1438}]}';
        $request = $this->litensi(mockResponse: $success)->sms()->prices();
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->sms()->prices();
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_sms_order()
    {
        $success = '{"success":true,"data":{"order_id":5751,"country_id":7,"country_name":"Indonesia","service_id":159,"service_name":"JTExpress","operator":"any","phone":"628385582230","expired_at":"2023-11-10 01:16:36","status":"WAITING"}}';
        $request = $this->litensi(mockResponse: $success)->sms()->order(1, 1, 'test');
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->sms()->order(1, 1, 'test');
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_sms_getStatus()
    {
        $success = '{"success":true,"data":{"order_id":5751,"phone":"628385582230","sms":"412439","status":"RECEIVED"}}';
        $request = $this->litensi(mockResponse: $success)->sms()->getStatus(1);
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->sms()->getStatus(1);
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_sms_setStatus()
    {
        $success = '{"success":true,"data":{"order_id":5751,"phone":"628385582230","status":"RESEND"}}';
        $request = $this->litensi(mockResponse: $success)->sms()->setStatus(1, 'test');
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->sms()->setStatus(1, 'test');
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }
}
