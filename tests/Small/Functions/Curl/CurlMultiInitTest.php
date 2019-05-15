<?php

namespace ts\Tests\Small\Functions\Curl;

use PHPUnit\Framework\TestCase;

/**
 * @small
 */
class CurlMultiInitTest extends TestCase
{

    /**
     * @test
     */
    public function curlMutliInitTestReturnsResource(): void
    {
        self::assertIsResource(\ts\curl_multi_init());
    }

//    /**
//     * @test
//     */
//    public function curlMultiGetContentThrowsExceptionOnFalseTypeInput(): void
//    {
//        $this->expectException(\RuntimeException::class);
//        $ch = null;
//        \ts\curl_multi_getcontent($ch);
//    }
//
//    /**
//     * @test
//     */
//    public function curlMultiGetContentThrowsExceptionOnEmptyCurlInit(): void
//    {
//        $this->expectException(\RuntimeException::class);
//        $ch = curl_init('');
//        $a = curl_exec($ch);
//        \ts\curl_multi_getcontent($a);
//    }
//


}
