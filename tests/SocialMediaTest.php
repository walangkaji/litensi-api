<?php

namespace walangkaji\LitensiAPITests;

class SocialMediaTest extends BaseTestCase
{
    public function test_social_media_services()
    {
        $success = '{"success":true,"data":[{"id":4672,"category":"Instagram Followers (No Refill)","name":"Instagram Followers Mp 31 ( Less Drop | Drop 10-20% ) ","price":29726,"min":100,"max":5000,"description":"1k in 1 minutes\n80% real\nKemungkinan drop 10-20% jika anda memesan 1000+\n","type":"primary","refill":0,"refill_period":0,"average":"jumlah pesan rata rata 600 waktu proses 15 jam 35 menit."},{"id":4685,"category":"Instagram Followers (No Refill)","name":"Instagram Followers Server 7 ( Fastest - Bot ) ","price":5772,"min":10,"max":30000,"description":"Bot Quality","type":"primary","refill":0,"refill_period":0,"average":"jumlah pesan rata rata 356 waktu proses 1 jam 6 menit."}]}';
        $request = $this->litensi(mockResponse: $success)->socialMedia()->services();
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->socialMedia()->services();
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_social_media_order()
    {
        $success = '{"success":true,"data":{"id":16445,"price":226,"status":"Pending"}}';
        $request = $this->litensi(mockResponse: $success)->socialMedia()->order(1, 'test', 1);
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->socialMedia()->order(1, 'test', 1);
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }

    public function test_social_media_status()
    {
        $success = '{"success":true,"data":[{"id":25647,"status":"Success","total_charge":925.18,"start_count":10181,"remains":0}]}';
        $request = $this->litensi(mockResponse: $success)->socialMedia()->status(1);
        $this->assertSame(json_decode($success, true), $request->toArray());

        $failed  = '{"success":false,"data":"API salah atau tidak aktif"}';
        $request = $this->litensi(mockResponse: $failed)->socialMedia()->status(1);
        $this->assertSame(json_decode($failed, true), $request->toArray());
    }
}
