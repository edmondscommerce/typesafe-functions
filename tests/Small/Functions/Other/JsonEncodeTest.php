<?php declare(strict_types=1);

namespace ts\Tests\Small\Functions\Other;

use PHPUnit\Framework\TestCase;

/**
 * @package ts\Tests\Small
 * @covers  \ts\json_encode
 */
class JsonEncodeTest extends TestCase
{
    /**
     * @test
     * @small
     */
    public function jsonEncodeReturnsAValidString(): void
    {
        $expected = '{"test":123}';
        $encode = [
            'test'=>123
        ];
        $result = \ts\json_encode($encode);
        self::assertSame($result, $expected);
    }

    /**
     * @test
     * @small
     */
    public function jsonEncodeFailsWithNoLastJsonError():void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('An unknown error occurred in ts\json_encode Type is not supported');
        \ts\json_encode(fopen(__FILE__, 'rb'));
    }


    /**
     * @test
     * @small
     */
    public function jsonEncodePassInResourceAndReceiveRuntimeError(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('An error occurred in ts\json_encode Type is not supported');
        $encode = curl_init();
        \ts\json_encode($encode);
    }
}
